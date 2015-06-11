<?php include("system-header.php"); ?>

<!--  Start of content -->
<DIV style="height:500px;">
<?php
/*
============================
QuickCaptcha 1.0 - A bot-thwarting text-in-image web tool.
Copyright (c) 2006 Web 1 Marketing, Inc.

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
============================
See settings.php for common settings. You shouldn't need to change
anything in this file.
============================
*/
include "settings.php";


echo "<P class='actionMessage'>Thank you for your registration.</P>";
echo "<H4>We will contact you shortly.</H4>";

mail(
		"info@ukglobalfreight.com", 
		"Information request", 
		$_POST["messagebox"],
		"from: " .$_POST["lastnamebox"] . "<" . $_POST["emailbox"] . ">"
	);
?>
</DIV>
<!--  End of content -->

<?php include("system-footer.php"); ?>
