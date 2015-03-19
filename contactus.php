<?php include("system-header.php"); ?>

<!--  Start of content -->
<style>
.row {
	margin-left: -15px;
	margin-right: -15px;
	input
	,
}

#firstHeading {
	font-size: 11pt;
}

#bodyContent p {
	font-size: 10pt ! important;
}

.message-submit,#form-contact input {
	height: 48px;
}

input,.message-submit,#form-contact input {
	height: 38px;
	width: 400px;
	font-size: 20px;
}

textarea {
	width: 800px;
	color: black ! important;
	font-size: 20px;
	border: 1px solid #ddd;
	padding: 12px 24px;
}

h3,.main p,.main ul li,.contact-info ul,input,textarea,.section-features header,.footer-top h1 a,.upn-service form
	{
	margin-bottom: 15px;
}

.col-md-4 {
	float: left;
	width: 300px;
}

.container {
	color: #666666;
}

#map-canvas {
	width: 900px;
	height: 408px;
}

.row {
	margin-bottom: 20px;
}

.contact-info,.contact-info p {
	font-size: 13px;
	line-height: 15pt;
}

.col-md-6 {
	float: left;
	padding-right: 40px;
}

.container a {
	color: grey;
}

.container {
	margin-left: 15px;
}

#questions {
	font-style: italic;
	color: #555555;
}

.col-md-12 input {
	color: white;
	width: 150px ! important;
	margin-top: -20px;
	height: 50px ! important;
	padding: 10px;
	background: red;
}
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBueQ5qAG-V_9KkigdKJyc_PbcCXyY7SFc&amp;sensor=false&amp;region=GB"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

function validate_form() {
	if (document.getElementById("surnamebox").value == "") {
		alert("Please fill in the 'Name' box");
		return false;
	}

	if (document.getElementById("emailbox").value == "") {
		alert("Please fill in either the 'E-mail' box");
		return false;
	}

	return true;
}

$(document).ready(function(){
  function initialize() {
    var myLatlng = new google.maps.LatLng(53.066155, -1.375120);
    var mapOptions = {
      zoom: 12,
      center: myLatlng
    };

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    var contentString = 
        '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h4 id="firstHeading" class="firstHeading">Allegro Transport Ltd.</h4>'+
        '<div id="bodyContent">'+
        '<p>Birchwood Way, Cotes Park Industrial Estate, Somercotes, Alfreton, Derbyshire, DE55 4QQ</p>'+
        '</div>'+
        '</div>';

    var infowindow = new google.maps.InfoWindow({
        content: contentString,
        maxWidth: 165
    });

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Allegro Transport Ltd.'
    });

    infowindow.open(map,marker);
    
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
  }

  $(".google-map").css("display","block");
  
  google.maps.event.addDomListener(window, 'load', initialize);
});
</script>

<section class="services">
	<div class="shell">
		<div class="row">
			<div class="col-md-12 google-map">
				<div id="map-canvas"></div>
			</div>
		</div>
		<div class="row contact-info">
			<div class="col-md-4 col-sm-6">
				<ul>
					<li>
						<i class="fa fa-map-marker fl"></i>
						<div>Birchwood Way, <br>
						Cotes Park Industrial Estate <br />
					
						Somercotes, Alfreton, Derbyshire <br />
						DE55 4QQ United Kingdom</div>
					</li>
					<li>
						<i class="fa fa-phone fl"></i>
						<div>+44 (0) 1773 541 771</div>
					</li>
					<li>
						<i class="fa fa-print fl"></i>
						<div>+44 (0) 1773 541 774</div>
					</li>
					<li>
						<i class="fa fa-envelope fl"></i>
						<div>
							<a href="mailto:traffic@allegrotransport.co.uk">traffic@allegrotransport.co.uk</a>
						</div>
					</li>
					<li>
						<i class="fa fa-globe fl"></i>
						<div>
							<a href="http://www.allegrotransport.co.uk">www.allegrotransport.co.uk</a>
						</div>
					</li>
					<li>
						<i class="fa fa-facebook-square fl"></i>
						<div>
							<a href="https://www.facebook.com/allegrotransport">Facebook page</a>
						</div>
					</li>
				</ul>

				<p id="questions">If you have any questions, comments or ask a quote,
				please don&#39;t hesitate to contact us in whatever way is most
				convenient for you</p>
			</div>
			<!-- CONTACT FORM -->
			<div class="col-md-8 col-sm-6">
				<FORM action="contactsend.php" method="post" id="form-contact" name="contactForm" onSubmit="return validate_form ();">
					<div class="row">
						<div class="col-md-6">
							<span class="demo-input-info">Letters and spaces only (3-25 characters)</span> 
							<span class="demo-errors"></span><br>
							<input type="text" name="lastnamebox" id="lastnamebox" maxlength="25" class="validate-locally" value="Name*"
								onblur="if(this.value=='')this.value='Name*'"
								onfocus="if(this.value=='Name*')this.value=''" />
						</div>
						<div class="col-md-6">
							<span class="demo-input-info">E.g.: name@company.com</span> <span class="demo-errors"></span><br>
							<input type="text" name="emailbox" id="emailbox" class="validate-locally" value="E-mail*" onblur="if(this.value=='')this.value='E-mail*'" onfocus="if(this.value=='E-mail*')this.value=''" /></div>

						</div>
						<div class="row">
							<div class="col-md-12">
								<span class="demo-input-info">Your message should be 10 characters minimum</span> 
								<span class="demo-errors"></span><br>

								<textarea name="messagebox" id="messagebox" class="validate-locally"
									cols="30" rows="6" placeholder="Message*"
									onblur="if(this.placeholder=='')this.placeholder='Message*'"
									onfocus="if(this.placeholder=='Message*')this.placeholder=''">
								</textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<input id="submit" class="message-submit" type="submit" value="Contact Us" tabindex="5" name="submit">
							</div>
						</div>
					</form>

					<div class="ajax-message">
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
	





<!-- TEAM CONTACTS -->





<!--  End of content -->

<?php include("system-footer.php"); ?>

