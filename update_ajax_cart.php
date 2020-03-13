<?php
$a[] = "Anna";
$a[] = "Brittany";
$a[] = "444";

// get the q parameter from URL
$val = $_REQUEST["val"];
$id = $_REQUEST["id"];

$hint = "";

if ($val !== "") {
	include 'db.php';
	//connecting & inserting data
	// $querydetails = "SELECT * FROM details_command WHERE id_user = '$idsess' AND statut ='ready'";
	$query = "UPDATE `command` SET `quantity` = '$val' WHERE `command`.`id` = $id";

	if ($connection->query($query) === TRUE) {
		$hint = "<div class='center-align'>success</div>";
	} else {
		$hint = "";
	}
	$connection->close();
}


echo $hint === "" ? "Not Updated" : $hint;
// Output "no suggestion" if no hint was found or output correct values
