<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index');
}

require 'includes/header.php';
require 'includes/navconnected.php'; //require $nav;
?>

<div class="container-fluid product-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="index" class="breadcrumb">Dashboard</a>
          <a href="infoproduct" class="breadcrumb">Products</a>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col s12 m12">
      <div class="card">
        <div class="card-action">
          <a class="btn-large meh button-rounded waves-effect waves-light" href="addproduct">Add Product</a>
        </div>
      </div>
    </div>

    <div class="col s12 m12">
      <h5>Products</h5>
      <div class="card">
        <div class="scroll">
          <table class="highlight striped">
            <thead>
              <tr>
                <th data-field="name">Item name</th>
                <th data-field="price">Price</th>
                <th data-field="quantity">Quantity</th>
                <th data-field="action">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include '../db.php';

              $queryfirst = "SELECT * FROM product";
              $resultfirst = $connection->query($queryfirst);
              if ($resultfirst->num_rows > 0) {
                // output data of each row
                while ($rowfirst = $resultfirst->fetch_assoc()) {
                  $idp = $rowfirst['id'];
                  $name = $rowfirst['name'];
                  $quantity = $rowfirst['stock'];
                  $price = $rowfirst['price'];
              ?>
                  <tr>
                    <td><?= $name; ?></td>
                    <td><?= $price; ?></td>
                    <td><?= $quantity; ?></td>
                    <td><a href="deleteproduct.php?id=<?= $idp; ?>"><i class="material-icons red-text">close</i></a></td>
                  </tr>
              <?php
                }
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<?php require 'includes/footer.php'; ?>