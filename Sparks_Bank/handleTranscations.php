<?php

require_once('Oop.php');
//To get the user object from session
// $user = unserialize($_SESSION["user"]);

$user=new customer(1, 'RanaZyed', 'rana@gmail.com');
 $customers = $user->ViewAllTransactions();
$user->UpdateBalance($_POST["amount"],$_POST["Customer_id"]);
$account_id=$user->getAccountId($_POST["Customer_id"]);
$user->MakeTransaction($_POST["amount"],$account_id["id"]);
$x=$_POST["UserName"];
header("location:transactions.php?name=$x");
?>