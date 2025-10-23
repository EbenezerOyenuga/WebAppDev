<?php

namespace Oop;
require_once 'Account.php';
require_once 'User.php';
use Oop\Account;
use Oop\User;

class Savings extends Account{
   
    public function __construct(User $user)
    {
       // print('<pre> '.print_r($user,true).'</pre>'); exit();
        $this->account_id=$user->id;
        $this->account_name=$user->user_name;
        $this->create();
        $this->balance=$this->details[$this->account_id]['balance'];
    }

    public function create()
    {
       $this->details[$this->account_id]=[
           'name'=>$this->account_name,
           'balance'=>5
       ];
       //echo ucfirst($this->account_name)." Your account id is ".$this->account_id." </br>";
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
                $this->balance+=$amount; //$this->balance = $this->balance + $amount;
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
        try{
            if($amount>$this->balance)
            {
                $this->record_transaction($this::At, $amount);   
                echo $this->account_name." You attempted to withdraw ".$amount." on your savings account with no success </br>";
                $this->error('Insufficient Funds </br>');
            }
            else
            {
                $this->balance-=$amount;
                $this->record_transaction($this::Db, $amount);
                echo $this->account_name." You Withdrew ".$amount." </br>";
                return true;
            } 
        }
        catch(\Exception $e){
            return $e->getMessage();
       }
      
    }

    public function checkBalance()
    {
        echo $this->account_name. " Your Balance is ";
        return $this->balance;
    }
}