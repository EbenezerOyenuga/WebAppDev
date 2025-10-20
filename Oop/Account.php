<?php

  namespace Oop;
  require_once 'Operations.php';
  use Oop\Operations;

  abstract class Account implements Operations {
     public $balance;
     public $account_id;
     public $account_name;
     public $details=[];
     public $transactions=[];
     
     const Db=0;
     const Cr=1;
     const At=2;
     const Od=3;
     const Tr=4;

     public function error($error)
     {
         throw new \Exception($error);
     }

     public function record_transaction($type,$amount)
     {
         $initial=0;
         if($type==1)
         {
             $initial=$this->balance-$amount;
         }
         else if($type==0 || $type==3)
         {
             $initial=$this->balance+$amount;
         }
         else
         {
             $initial=$this->balance;
         }
        $data=[
            'initial'=>$initial,
            'type'=>$type,
            'amount'=>$amount,
            'balance'=>$this->balance
        ];
        array_push($this->transactions, $data);
     }

     public function print_transactions()
     {
         //var_dump($this->transactions); exit();
         echo "<hr/>";
         echo "<h3>Name: ".$this->account_name." </h3></br>";
         echo "<h3>Account Number: ".$this->account_id." </h3></br>";
         echo "<table border='1'><thead><th>Initial Balance</th> <th>Type</th> <th>Amount</th> <th>Balance</th></thead>";
         foreach($this->transactions as $transaction)
         {
             echo "<tr>";
             echo "<td>".$transaction['initial']."</td>";
             echo ($transaction['type']==1)?"<td> Credit </td>": (($transaction['type']==2)?"<td> Attempted </td>":(($transaction['type']==3)?"<td> Overdraft </td>":(($transaction['type']==4)?"<td>Initiated Transfer</td>":"<td> Debit </td>")));
             echo "<td>".$transaction['amount']."</td>";
             echo "<td>".$transaction['balance']."</td>";
             echo "</tr>";
         }
         echo"</table>";
     }

}