<?php 
	include("system-header.php");
?>
<div>
<?php
	echo "<P class='actionMessage'>Thank you for requesting a quote.</P>";
	echo "<H4>We will contact you shortly.</H4>";

	mail(
			"info@ukglobalfreight.com",
			"Quote request",
			"Phone : " . $_POST["telephone"] . "\n" . "\n" . 
			"Additional Info : " . $_POST["additionalinfo"] . "\n" . 
			"Name : " . $_POST["contactname"] . "\n" .
			"From : " . $_POST["from"] . "\n" .
			"To : " . $_POST["to"] . "\n" .
			"Date : " . $_POST["collectiondate"] . " " . $_POST['collectiontime'],
			"from: " . $_POST["contactname"] .  "<" . $_POST["email"] . ">"
		);
?>
</div>

<?php include("system-footer.php") ?>

