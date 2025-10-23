<?php
class Auth {
    private $store;
    private $cookieName = 'remember_token';
    private $cookieExpire = 60*60*24*30; // 30 days

    public function __construct(UserStore $store){
        $this->store = $store;
        $this->attemptRememberLogin();
    }

    public function register($email, $password){
        if ($this->store->findByEmail($email)) {
            throw new Exception('Email already registered');
        }
        $id = bin2hex(random_bytes(8));
        $user = [
            'id' => $id,
            'email' => $email,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'remember_token_hash' => null,
            'created_at' => time()
        ];
        $this->store->addUser($user);
        $this->loginSession($user);
    }

    public function login($email, $password, $remember = false){
        $user = $this->store->findByEmail($email);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            return false;
        }
        $this->loginSession($user);
        if ($remember) $this->setRememberToken($user);
        return true;
    }

    private function loginSession($user){
        // regenerate id to prevent fixation
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
    }

    public function logout(){
        if ($this->user()){
            $u = $this->store->findById($_SESSION['user_id']);
            if ($u){
                $u['remember_token_hash'] = null;
                $this->store->updateUser($u);
            }
        }
        // clear session
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time()-42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        // clear remember cookie
        setcookie($this->cookieName, '', [
            'expires' => time() - 3600,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }

    public function user(){
        if (!empty($_SESSION['user_id'])) {
            return $this->store->findById($_SESSION['user_id']);
        }
        return null;
    }

    private function setRememberToken(array $user){
        $token = bin2hex(random_bytes(32));
        $user['remember_token_hash'] = password_hash($token, PASSWORD_DEFAULT);
        $this->store->updateUser($user);
        setcookie($this->cookieName, $token, [
            'expires' => time() + $this->cookieExpire,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }

    private function attemptRememberLogin(){
        if (!empty($_SESSION['user_id'])) return; // already logged in via session
        if (empty($_COOKIE[$this->cookieName])) return;
        $token = $_COOKIE[$this->cookieName];
        $user = $this->store->findByRememberToken($token);
        if ($user){
            // log in
            $_SESSION['user_id'] = $user['id'];
            // refresh token for security
            $this->setRememberToken($user);
            return;
        }
        // invalid token -> clear cookie
        setcookie($this->cookieName, '', [
            'expires' => time() - 3600,
            'path' => '/',
            'secure' => !empty($_SERVER['HTTPS']),
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }
}