<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<title></title>

	<link rel='stylesheet' type='text/css' href='css/newModal.css'>

<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>



    <!-- BOOTSTRAP -->
    <script src='https://kit.fontawesome.com/42135a69b7.js' crossorigin='anonymous'>
    </script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi' crossorigin='anonymous'>
    
</head>
<body>


<div class='terms-modal' id='terms'>  
	<div class='wrapper-terms'>
  		<div class='handler'>
		    <h4>TERMS AND CONDITIONS: </h4>
		    <p>Medhive is an electronic medical helper that manages provides assistance in medical services, may it be finding a doctor, booking an appointment or organizing medical records.
			The following terms and conditions are implemented by the web application faculties, may it be the administrator, the user or the owner of the web-app:<br>
			<br>

			1.) Medhive is not accountable for wrong personal informations or details and drug details. <br>
			<br>
			2.) Medhive is not accountable for poor handling of your confidential assets in the medhive records center. <br>
			<br>
			3.) Medhive prohibits of uploading and sharing of explicit contents such as gore graphics or pornography. <br>
			<br>
			4.) Medhive prohibits snooping, modifying or deleting on the resources of the web application unless given a permission by the administrator. <br>
			<br>
			5.) Medhive prohibits the copying of resources of the web-app and reproducing it for profits. <br>
			<br>

			Committing these acts can be punishable by law. If you agree with these terms and conditions you may press the 'I agree' button below.</p>
	    </div>

	    <div class='handler'>
	    	<h4>PRIVACY POLICY:</h4>
	    	<p>Medhive is a web application that integrates booking appointment, virtual conference with the doctor and patient and medical documents organizer.
			The records center contains the most confidential documents of the patient and doctor. Medhive provides security measures around the integrated module.
 			It is the responsibility of the user to provide extra care and security on sharing, uploading, deleting or modifying their records. 
			Medhive is not liable to lost or broken records caused by a third party action.</p>
	    </div>

	    <div class='handler'>
	    	<h4>DISCLAIMER</h4>
	    	<p>Medhive is a web application built up with codes which means bugs, glitches and errors could occur sometimes. If your data or records are damage or lost because of glitches or errors you can contact someone to help and assist you on <b>medhive@webapp.com.</b></p>
	    </div>
	    <button class='button' onclick='terms()'>I agree</button>
	</div>

</div>



<div class="successful-modal" id="success" onclick="success()">
	<div class="wrapper-success">

		<img src="images/success.png">
		<h4><b> SUCCESS! </b></h4>
	</div>
</div>









<script type='text/javascript' src='js/events.js'></script>
</body>
</html>