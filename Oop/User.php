<?php

namespace Oop;

require_once 'Rand.php';
use Oop\Rand;

class User{

    use Rand;
    public $user_name;
    public $id;
    public function __construct($name)
    {
       $this->user_name=$name;
       $this->id=$this->rand_id();
    }


}