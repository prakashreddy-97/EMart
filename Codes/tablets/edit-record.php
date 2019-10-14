<?php
require "templates/top.php";
require "include/config.php";
require "templates/head.php";
echo "<link rel='stylesheet' href='templates/custom.css' type='text/css'>";
?>

<div class="container-fluid product-page">
    <div class="container current-page">
    <nav>
        <div class="nav-wraper">
            <div class="col s12">
                <a href="index" class = "breadcrumb">Dashboard</a>
                <a href="infoproduct" class = "breadcrumb">Products</a>
                <a href="editproduct" class = "breadcrumb">Commands</a>
            </div>
        </div>
    </nav>
    </div>
</div>

<div class="container scroll">
<table class="highlight striped">
     <thead>
       <tr>
           <th data-field="name">Item name</th>
           <th data-field="price">Price</th>
           <th data-field="quantity">Quantity</th>
           <th data-field="user">User</th>
           <th data-field="statut">Statut</th>
           <th data-field="delete">Delete</th>
       </tr>
     </thead>
     <tbody>
<?php
require "include/config.php";


$queryfirst = "SELECT
product.p_name as 'productName',
product.price as 'price',
product.img as 'image',
product.description as 'description';



ORDER BY SUM(command.id_user) DESC ";
$resultfirst = $connection->query($queryfirst);
if ($resultfirst->num_rows > 0) {
  // output data of each row
  while($rowfirst = $resultfirst->fetch_assoc()) {

        $name = $rowfirst['productName'];
        $price = $rowfirst['price'];
        $img = $rowfirst['image'];
       
        $description = $rowfirst['description'];

    ?>
    <tr>
      <td><?= $name; ?></td>
      <td><?= $price; ?></td>
      <td><?= $quantity; ?></td>
      <td><?php echo" $userfirstname "." $userlasttname"; ?></td>
      <td><?= $statut; ?></td>
      <td><a href="deletecmd.php?id=<?= $idp; ?>&userid=<?= $user; ?>"><i class="material-icons red-text">close</i></a></td>
    </tr>
    <?php }}  ?>
  </tbody>
</table>
</div>

 <?php require 'includes/footer.php'; ?>