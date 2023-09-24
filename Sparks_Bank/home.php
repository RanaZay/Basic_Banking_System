<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php

require_once('Oop.php');
//To get the user object from session
// $user = unserialize($_SESSION["user"]);
require_once('navBar.php');
$user=new customer(1, 'RanaZyed', 'rana@gmail.com');
 $customers = $user->ViewAllCustomers();
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
<link href="assets/modals.scss" rel="stylesheet">

<style>
  .modal-sheet .modal-dialog {
  width: 380px;
  transition: bottom .75s ease-in-out;
}
.modal-sheet .modal-footer {
  padding-bottom: 2rem;
}
</style>


    
    <!-- Custom styles for this template -->
    <link href="navbars.css" rel="stylesheet">
  </head>
  <body>
  <table class="table table-striped" style="width:70%;margin:auto;margin-top:15px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Balance</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php

    foreach( $customers as $customer){
      $balance=$user->getBalance($customer["0"]);
      $Id=$customer["0"];
      $name=$customer["1"];
      
      ?>
      <tr>
      <th scope="row" ><?=$customer["0"]?></th>
      <th><?=$customer["1"]?></th>
      <td><?=$customer["2"]?></td>
      <td><?=$balance["balance"]?>.00$</td>

 
    <td>
      
      
        <button type="button" class="primary" onclick='storeId(<?=$Id?>,"<?=$name?>")' >Make a Transaction</button>
     
    
  </td>
  <?php
    }
    ?>
    <dialog id="dialog">
      <h2>Transaction</h2>
      <form action="handleTranscations.php" method="post">
        <input type="hidden" name="Customer_id" id="Customer_id" >
        <input type="hidden" name="UserName" id="UserName" >
            
            <div class="mb-3">
              <label for="amount" class="form-label">amount</label>
              <input type="text"
                class="form-control" name="amount" id="amount" aria-describedby="helpId" placeholder="">
              <small id="helpId" class="form-text text-muted">$</small>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
    </dialog>


</tbody>
</table>

 
</main>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script>

function storeId(Id,name){
  // var Id= document.getElementById("id").innerHTML;
 document.getElementById("Customer_id").setAttribute('value', Id);
  document.getElementById("UserName").setAttribute('value', name);
 console.log(Id);
 console.log(name);
 window.dialog.showModal();

}

</script>


    </body>
</html>
