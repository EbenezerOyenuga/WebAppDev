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
echo "<hr/>";
echo $account->print_transactions();