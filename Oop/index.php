<?php

ini_set('display_errors', 1);

require_once 'requires.php';

use Oop\Savings as Savings;
use Oop\User as User;
use Oop\Current as Current;



$user=new User('Akintunde Oluwaseyi John');
$account=new Savings($user);
$account->deposit(10);
$account->deposit(5);
$account->deposit(20);
$account->withdraw(4);
$account->withdraw(23);
$account->deposit(15);
$account->deposit(-15);
$account->withdraw(12);
$account->deposit(14.5);
$account->withdraw(80);
$account->deposit(23);
echo $account->checkBalance();
echo $account->print_transactions();

$curr_account=new Current($user);
$curr_account->deposit(100);
$curr_account->withdraw(50);
$curr_account->withdraw(70);
echo $curr_account->checkBalance();
echo $curr_account->print_transactions();


$new_user=new User('Doe Jane');
$new_curr_account=new Current($new_user);
$new_curr_account->deposit(200);
$new_curr_account->withdraw(150); 
$new_curr_account->withdraw(1000);      
echo $new_curr_account->checkBalance();
echo $new_curr_account->print_transactions();