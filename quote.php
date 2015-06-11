<?php 
	include("system-header.php"); 
?>
<section class="services">
	<div class="shell">
		<form method="post" action="postquote.php" id="quoteform">
			<table>
				<tr>
					<td>* Contact Name</td>
					<td>
						<input type="text" id="contactname" name="contactname" size="70" />
					</td>
				</tr>
				<tr>
					<td>Company</td>
					<td>
						<input type="text" id="company" name="company" size="70" />
					</td>
				</tr>
				<tr>
					<td>Address</td>
					<td>
						<textarea id="address" name="address" cols="40" rows="5" style="width:445px"></textarea>
					</td>
				</tr>
				<tr>
					<td>* Telephone</td>
					<td>
						<input type="text" id="telephone" name="telephone" size="40" />
					</td>
				</tr>
				<tr>
					<td>Fax</td>
					<td>
						<input type="text" id="fax" name="fax" size="40" />
					</td>
				</tr>
				<tr>
					<td>* Email</td>
					<td>
						<input type="text" id="email" name="email" size="70" />
					</td>
				</tr>
				<tr class="quotedivision">
					<td colspan=2>If you are making a booking</td>
				</tr>
				<tr>
					<td>* Date of collection</td>
					<td>
						<input type="text" class="datepicker" id="collectiondate" name="collectiondate" />
					</td>
				</tr>
				<tr>
					<td>* Time of collection</td>
					<td>
						<input type="text" class="timepicker" id="collectiontime" name="collectiontime" />
					</td>
				</tr>
				<tr class="quotedivision">
					<td colspan=2>Shipment details</td>
				</tr>
				<tr>
					<td>Import or Export</td>
					<td>
						<SELECT id="importexport" name="importexport">
							<OPTION value="I">Import</OPTION>
							<OPTION value="E">Export</OPTION>
						</SELECT>
					</td>
				</tr>
				<tr>
					<td>* From</td>
					<td>
						<input type="text" id="from" name="from" size="70" />
					</td>
				</tr>
				<tr>
					<td>* To</td>
					<td>
						<input type="text" id="to" name="to" size="70" />
					</td>
				</tr>
				<tr>
					<td>Additional Information</td>
					<td>
						<textarea id="additionalinfo" name="additionalinfo" cols="70" rows="5" style="width:445px"></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="button" onclick="postform()" value="Submit"></input>
					</td>
				</tr>
			</table>
			
		</form>
	</div>
</section>
<script>
function postform() {
	if ($("#contactname").val() == "") {
		alert("Contact name required");
		return;
	}

	if ($("#telephone").val() == "") {
		alert("Telephone required");
		return;
	}

	if ($("#email").val() == "") {
		alert("Email required");
		return;
	}

	if ($("#collectiondate").val() == "") {
		alert("Collection date required");
		return;
	}

	if ($("#collectiontime").val() == "") {
		alert("Collection time required");
		return;
	}

	if ($("#from").val() == "") {
		alert("From required");
		return;
	}

	if ($("#to").val() == "") {
		alert("To required");
		return;
	}

	$("#quoteform").submit();
}
</script>
<?php 
	include("system-footer.php"); 
?>
