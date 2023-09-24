<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php

require_once('Oop.php');
//To get the user object from session
// $user = unserialize($_SESSION["user"]);
require_once('navBar.php');
$user=new customer(1, 'RanaZyed', 'rana@gmail.com');
 $customers = $user->ViewAllTransactions();
// $recentPosts = $user->showRecentPosts();
?>
  <head><script src="assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.115.4">
    <title>Navbar Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbars/">

    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


    
    <!-- Custom styles for this template -->
    <link href="navbars.css" rel="stylesheet">
    <link href="assets/modals.scss" rel="stylesheet">
  </head>
  <body>



  <table class="table"  style="width:70%;margin:auto;margin-top:15px;">
  <thead>
    <tr>
      <th scope="col">Transaction Number</th>
      <th scope="col">Name</th>
      <th scope="col">Transaction Amount</th>
      <th scope="col">Balance</th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach( $customers as $customer){
      $customer_id=$user->getCustomerId($customer["3"]);
      $balance=$user->getBalance($customer_id["Customers_id"]);
      $name=$user->getName($customer_id["Customers_id"]);
     
      ?>
      <tr>
      <th scope="row"><?=$customer["0"]?></th>
      <td><?= $name["name"]?></td>
      <td><?=$customer["2"]?></td>
      <td><?=$balance["balance"]?>.00$</td>
    </tr>
      <?php
    }
    ?>
    
  
  </tbody>
</table>

 
</main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>


    </body>
</html>
