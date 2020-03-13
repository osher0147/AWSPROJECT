<?php
session_start();
$cartTotal = 0;
if ($_SESSION['item'] < 1 or !isset($_SESSION['logged_in'])) {
  header('Location: sign');
} else {
  $nav = 'includes/navconnected.php';
  $idsess = $_SESSION['id'];
}



require 'includes/header.php';
require $nav; ?>
<div class="container-fluid product-page">
  <div class="container current-page">
    <nav>
      <div class="nav-wrapper">
        <div class="col s12">
          <a href="index" class="breadcrumb">Home</a>
          <a href="cart" class="breadcrumb">Cart</a>
        </div>
      </div>
    </nav>
  </div>
</div>

<div class="container scroll info">
  <table class="highlight">
    <thead>
      <tr>
        <th data-field="name">Item Name</th>
        <th data-field="category">Category</th>
        <th data-field="price">Price</th>
        <th data-field="quantity">Quantity</th>
        <th data-field="total">Total</th>
      </tr>
    </thead>
    <tbody>
      <?php
      include 'db.php';
      //get products
      $queryproduct = "SELECT product.name as 'name',
          product.id as 'id', product.price as 'price',
          category.name as 'category', 
          command.id as 'order_id', command.id_user, command.statut,
          command.quantity as 'quantity'
FROM category, product, command
WHERE command.id_produit = product.id AND product.id_category = category.id AND command.statut = 'ordered'";
      $result1 = $connection->query($queryproduct);
      if ($result1->num_rows > 0) {
        // output data of each row
        while ($rowproduct = $result1->fetch_assoc()) {
          $id_productdb = $rowproduct['id'];
          $order_id = $rowproduct['order_id'];

          $name_product = $rowproduct['name'];
          $category_product = $rowproduct['category'];
          $quantity_product = $rowproduct['quantity'];
          $price_product = $rowproduct['price'];
          $cartTotal = $cartTotal + $price_product * $quantity_product;
      ?>
          <tr>
            <td><?= $name_product; ?></td>
            <td><?= $category_product; ?></td>
            <td><?= $price_product; ?></td>
            <td>
              <form><input onchange="showHint(<?php echo $order_id; ?>,this.value)" onkeyup="showHint(<?php echo $order_id; ?>,this.value)" type="number" min="1" value="<?= $quantity_product; ?>"></form>
            </td>
            <td><?= $price_product * $quantity_product; ?></td>
            <td><a href="deletecommand.php?id=<?= $id_productdb; ?>"><i class="material-icons red-text">close</i></a></td>
          </tr>
      <?php }
      } ?>
    </tbody>

    <span id="txtHint"></span>
  </table>
  <span>
    <div id="livesearch"></div>
  </span>
  <h5>Total: <strong><?php echo $cartTotal; ?></strong></h5>
  <div class="right-align">
    <a href="checkout" class='btn-large button-rounded waves-effect waves-light'>
      Check out <i class="material-icons right">payment</i></a>
  </div>
</div>

<script>
  // function updateCart(val) {
  //   alert("The input value has changed. The new value is: " + val);
  // }

  function showHint(id, val) {
    if (val.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET", "update_ajax_cart.php?id=" + id + "&val=" + val, true);
      xmlhttp.send();
    }
  }
</script>
<?php
require 'includes/secondfooter.php';
require 'includes/footer.php'; ?>