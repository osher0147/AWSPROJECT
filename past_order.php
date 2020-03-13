<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
	$nav = 'includes/nav.php';
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

<div class="container-fluid about" id="about">
	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<h3 class="animated slideInUp wow">Past Orders</h3>
				<div class="divider animated slideInUp wow"></div>

				<div class="container scroll info">
					<table class="highlight">
						<thead>
							<tr>
								<th data-field="date">Date</th>
								<th data-field="id">Order ID</th>
								<th data-field="name">Items Name</th>
								<th data-field="quantity">Quantity</th>
								<th data-field="total">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include 'db.php';
							//get products
							$queryproduct = "SELECT * FROM details_command";
							$result1 = $connection->query($queryproduct);
							if ($result1->num_rows > 0) {
								// output data of each row
								while ($rowproduct = $result1->fetch_assoc()) {
									$order_id = $rowproduct['id'];
									$date = $rowproduct['date'];
									$date = new DateTime($date);
									$date = $date->format('M d Y');

									$price = $rowproduct['price'];
									$product = $rowproduct['product'];
									$quantity = $rowproduct['quantity'];
									$price_product = $rowproduct['price'];
							?>
									<tr>
										<td><?= $date; ?></td>
										<td><?= $order_id; ?></td>
										<td><?= $product; ?></td>
										<td><?= $quantity; ?></td>
										<td><?= $price; ?></td>
									</tr>
							<?php }
							} ?>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>

<?php
require 'includes/secondfooter.php';
require 'includes/footer.php'; ?>