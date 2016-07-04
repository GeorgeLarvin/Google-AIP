<!doctype html>
<html>
<head>
<title>My First Webpage</title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/
bootstrap-theme.min.css">
<style>
html, body {
	height:100%;
}
.container {
	background-image:url("image1.png");
	width:100%;
	height:100%;
	background-size:cover;
	background-position:center;
	padding-top:100px;
}
.center {
	text-align:center;
}
.white {
	background-color:white;
	border-radius:20px;
	padding:20px;
	opacity:0.9;
}
p {
	padding-top:15px;
	padding-bottom:15px;
	opacity:1;
}
h1 {
	opacity:1;
}
button {
	margin-top:20px;
	margin-bottom:20px;
}
.alert {
	margin-top:20px;
	display:none;
}
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 center white">
				<h1 class="center">Postcode finder</h1>
				<p class="lead center">Enter your address below to get a postcode for the address.</p>
			
				<form>
					<div class="form-group">
					<input type="text" class="form-control" name="city" id="address" placeholder="Eg.68 smith street"/>
					</div>
					<button id="findMyPostcode" class="btn btn-success btn-lg">Find My address</button>
				</form>
	
				<div id="success" class="alert alert-success">Success!</div>
				<div id="fail" class="alert alert-danger">Could not find postcode data for that city. Please try again.</div>
				<div id="noCity" class="alert alert-danger">Please enter a address!</div>
			</div>
		</div>
	</div>
	
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

<script>

	 $("#findMyPostcode").click(function(event) {
            
            var result=0;
            
            $(".alert").hide();
            
            event.preventDefault();
            
            $.ajax( {
            
            type: "GET",
            url: "https://maps.googleapis.com/maps/api/geocode/xml?address="+encodeURIComponent($('#address').val())+"&key=AIzaSyByulYPYODa_tX0lubc7wiuNFy9iDhOf_M",
            dataType: "xml",
            success: processXML,
            error: error
            
         });
         
         function error() {
            
            $("#fail2").fadeIn();
            
         }
         
         function processXML (xml) {
            
            $(xml).find("address_component").each(function() {
               
               if ($(this).find("type").text() == "postal_code") {
                  
                  $("#success").html("The postcode you need is "+$(this).find('long_name').text()).fadeIn();
                  
                  result=1;
                  
               }
               
            });
            
            if (result==0) {
               
               $("#fail").fadeIn();
               
            }
            
         }
            
         });

</script>
</body>
</html>