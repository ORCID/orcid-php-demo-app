<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ORCID Create on Demand Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="boostrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="boostrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="https://orcid.org/sites/default/files/images/orcid_16x16.png" />
  </head>

  <body>

<?php

//ORCID API CREDENTIALS - replace these values with your API credentials
////////////////////////////////////////////////////////////////////////

define('OAUTH_CLIENT_ID', 'APP-XXXXXXXXXXXXXXXX');//client ID
define('OAUTH_CLIENT_SECRET', 'XXXXXXXXXXXXXXXXXXXXXX');//client secret
define('OAUTH_REDIRECT_URI', 'https://your-redirect-uri.org');//redirect URI

//ORCID API ENDPOINTS
////////////////////////////////////////////////////////////////////////

//Sandbox - Member API
//define('OAUTH_AUTHORIZATION_URL', 'https://sandbox.orcid.org/oauth/authorize');//authorization endpoint
//define('OAUTH_TOKEN_URL', 'https://api.sandbox.orcid.org/oauth/token'); //token endpoint
//define('ENV', 'https://sandbox.orcid.org'); //environment

//Sandbox - Public API
//define('OAUTH_AUTHORIZATION_URL', 'https://sandbox.orcid.org/oauth/authorize');//authorization endpoint
//define('OAUTH_TOKEN_URL', 'https://pub.sandbox.orcid.org/oauth/token');//token endpoint
//define('ENV', 'https://sandbox.orcid.org'); //environment

//Production - Member API
define('OAUTH_AUTHORIZATION_URL', 'https://orcid.org/oauth/authorize');//authorization endpoint
define('OAUTH_TOKEN_URL', 'https://api.orcid.org/oauth/token'); //token endpoint
define('ENV', 'https://orcid.org'); //environment

//Production - Public API
//define('OAUTH_AUTHORIZATION_URL', 'https://orcid.org/oauth/authorize');//authorization endpoint
//define('OAUTH_TOKEN_URL', 'https://orcid.org/oauth/token');//token endpoint
//define('ENV', 'https://orcid.org'); //environment

//EXCHANGE AUTHORIZATION CODE FOR ACCESS TOKEN
////////////////////////////////////////////////////////////////////////

//If an authorization code exists, fetch the access token
if (isset($_GET['code'])) {

	//Build request parameter string
	$params = "client_id=" . OAUTH_CLIENT_ID . "&client_secret=" . OAUTH_CLIENT_SECRET . "&grant_type=authorization_code&code=" . $_GET['code'] . "&redirect_uri=" . OAUTH_REDIRECT_URI;


	//Initialize cURL session
	$ch = curl_init();

	//Set cURL options
	curl_setopt($ch, CURLOPT_URL, OAUTH_TOKEN_URL);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);//Turn off SSL certificate check for testing - remove this for production version!
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);//Turn off SSL certificate check for testing - remove this for production version!
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

	//Execute cURL command
	$result = curl_exec($ch);

	//Close cURL session
	curl_close($ch);

	//Transform cURL response from json string to php array
	$response = json_decode($result, true);

} else {
	//If an authorization code doesn't exist, redirect user to another page
	header( "Location: oauth-deny.php" ); die;
}

?>		

  <div class="container">

      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="index.php">Home</a></li>
          <li><a href="https://orcid.org" target="_blank">About ORCID</a></li>
          <li><a href="https://orcid.org/help/contact-us" target="_blank">Contact ORCID</a></li>
        </ul>
        <h3 class="muted">ORCID @ State University</h3>
      </div>

      <hr>

      <div class="jumbotron">
      <div class="alert alert-success"><h3>Connection complete!</h3></div>
      <h1>Thanks <?php echo $response['name']; ?>!</h1>
      <p class="lead">We have stored your ORCID <img src="https://orcid.org/sites/default/files/images/orcid_16x16.png" class="logo" width='16' height='16' alt="iD"/> <?php echo $response['orcid']; ?> in State University records.</p>
      <p class="lead">We've posted information about your role at State University to your ORCID record. Please review your record to confirm that the information is correct. If you notice any errors, please contact <a href="mailto:orcid@stateuniversity.edu">orcid@stateuniversity.edu</a> .</p>
      <p class="lead">You can revoke State University's permission at any time at <a href="https://orcid.org/account">https://orcid.org/account</a> .</p>
      <br> <br>
      <a class="btn btn-large"  href="<?php echo ENV; ?>/my-orcid" target="_blank">View your ORCID record</a>
      
  </div>

<hr>

      <!--<div class="row-fluid marketing">
        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="span6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>

      <hr>-->

      <div class="footer">
        Want to build your own create-on-demand app? <a href="https://github.com/lizkrznarich/orcid-demo-app" target="_blank">Get the code</a>
      </div>

    </div> <!-- /container -->

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="boostrap/js/jquery.js"></script>
    <script src="boostrap/js/bootstrap-transition.js"></script>
    <script src="boostrap/js/bootstrap-alert.js"></script>
    <script src="boostrap/js/bootstrap-modal.js"></script>
    <script src="boostrap/js/bootstrap-dropdown.js"></script>
    <script src="boostrap/js/bootstrap-scrollspy.js"></script>
    <script src="boostrap/js/bootstrap-tab.js"></script>
    <script src="boostrap/js/bootstrap-tooltip.js"></script>
    <script src="boostrap/js/bootstrap-popover.js"></script>
    <script src="boostrap/js/bootstrap-button.js"></script>
    <script src="boostrap/js/bootstrap-collapse.js"></script>
    <script src="boostrap/js/bootstrap-carousel.js"></script>
    <script src="boostrap/js/bootstrap-typeahead.js"></script>

  </body>
</html>
