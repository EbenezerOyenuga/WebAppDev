<?php

namespace Oop;

require_once 'Account.php';
require_once 'User.php';

use Oop\Account as Account;
use Oop\User as User;

class Current extends Account{

    public function __construct(User $user)
    {
        $this->account_id=$user->id;
        $this->account_name=$user->user_name;
        $this->create();
        $this->balance=$this->details[$this->account_id]['balance'];
    }

    public function create()
    {
        $this->details[$this->account_id]=[
            'name'=>$this->account_name,
            'balance'=>0
        ];
        echo ucfirst($this->account_name)." Your account id is ".$this->account_id." </br>";
    }

    public function deposit($amount)
    {
        try{
            if($amount<0)
            {   
                $this->record_transaction($this::At, $amount);
                $this->error('You cannot deposit funds less than 0 </br>');
            }
            else
            {
                $this->balance+=$amount;
                $this->record_transaction($this::Cr, $amount);
                echo $this->account_name." You Deposited ".$amount." </br>";
            } 
        }
        catch(\Exception $e){
            echo $e->getMessage();
       }
      
    }

    public function withdraw($amount)
    {
            if($amount>$this->balance)
            {
                $this->balance-=$amount;
                $this->record_transaction($this::Od, $amount);
                echo $this->account_name." You Made an overdraft of ".$amount." </br>";
                return true;
            }
            else
            {
                $this->balance-=$amount;
                $this->record_transaction($this::Db, $amount);
                echo $this->account_name." You Withdrew ".$amount." </br>";
            }
    }

    public function checkBalance()
    {
        echo $this->account_name. " Your Balance is ";
        return $this->balance;
    }
}
