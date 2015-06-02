<!DOCTYPE html>
<html>
<head>
<title>
		ORCID OAuth Redirect
</title>
<style>
	body{
		font-family: Helvetica, Arial, sans-serif;
		color: #999;
	}
	h1{
		
		font-size: 1.2em;
		//text-transform: uppercase;
		line-height: 24px;
		vertical-align: middle;

	}
	#return-message{
		border: 1px solid #D3D3D3;
		padding: 1em;
		background-color: #fff;
		border-radius: 8px;
		box-shadow: 1px 1px 3px #999;
		cursor: pointer;
		margin: 100px 0 0 100px;

	}



	
</style>
</head>

	<body>

<?php

/* start editable */
// Register your client at https://orcid.org/developer-tools and replace the details below
define('OAUTH_CLIENT_ID', 'APP-V05T7FZU8MBVCXGN');
define('OAUTH_CLIENT_SECRET', 'a6cb6542-d7d4-44e2-9280-310c0fe05697');
define('OAUTH_REDIRECT_URI', 'https://evening-oasis-3521.herokuapp.com/oauth-redirect.php'); // URL of this script
define('ORCID_PRODUCTION', false); // sandbox; change to true when ready to leave the  sandbox
/* end editable */

if (ORCID_PRODUCTION) {
  // production endpoints
  define('OAUTH_AUTHORIZATION_URL', 'https://orcid.org/oauth/authorize');
  define('OAUTH_TOKEN_URL', 'https://pub.orcid.org/oauth/token'); // public
  //define('OAUTH_TOKEN_URL', 'https://api.orcid.org/oauth/token'); // members
} else {
  // sandbox endpoints
  define('OAUTH_AUTHORIZATION_URL', 'https://sandbox.orcid.org/oauth/authorize');
  //define('OAUTH_TOKEN_URL', 'https://pub.sandbox.orcid.org/oauth/token'); // public
  define('OAUTH_TOKEN_URL', 'https://api.sandbox.orcid.org/oauth/token'); // members
}

$params = "client_id=" . OAUTH_CLIENT_ID . "&client_secret=" . OAUTH_CLIENT_SECRET . "&grant_type=authorization_code&code=" . $_GET['code'] . "&redirect_uri=" . OAUTH_REDIRECT_URI;

// redirect the user to approve the application
/*if (!$_GET['code']) {
  $state = bin2hex(openssl_random_pseudo_bytes(16));
  setcookie('oauth_state', $state, time() + 3600, null, null, false, true);

  $url = OAUTH_AUTHORIZATION_URL . '?' . http_build_query(array(
      'response_type' => 'code',
      'client_id' => OAUTH_CLIENT_ID,
      'redirect_uri' => OAUTH_REDIRECT_URI,
      'scope' => '/authenticate',
      'state' => $state,
  ));

  header('Location: ' . $url);
  exit();
}

// code is returned, check the state
if (!$_GET['state'] || $_GET['state'] !== $_COOKIE['oauth_state']) {
  exit('Invalid state');
}*/

// fetch the access token
$ch = curl_init();

	//Set cURL options
	//URL
	curl_setopt($ch, CURLOPT_URL, OAUTH_TOKEN_URL);
	//Headers
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	//POST request
	curl_setopt($ch, CURLOPT_POST, true);
	//POST params
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	//turn off SSL verification
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 

	$result = curl_exec($ch);

	curl_close($ch);

	//print_r($result);



//$info = curl_getinfo($curl);
$response = json_decode($result, true);

// ORCID = $response['orcid']

//print_r($response);
//exit();

?>		



<?php
/*if (isset($_GET['code'])) {
    // try to get an access token
    $code = $_GET['code'];
    $url = 'https://api.sandbox.orcid.org/oauth/token';
    $params = "client_id=APP-V05T7FZU8MBVCXGN&client_secret=a6cb6542-d7d4-44e2-9280-310c0fe05697&grant_type=authorization_code&code=" . $_GET['code'] . "&redirect_uri=http://localhost/orcid/oauth-redirect.php";

	//echo $params . "</br>";


    $ch = curl_init();

	//Set cURL options
	//URL
	curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.orcid.org/oauth/token');
	//Headers
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	//POST request
	curl_setopt($ch, CURLOPT_POST, true);
	//POST params
	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
	//turn off SSL verification
	curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $output = curl_exec($ch);
    //$info = curl_getinfo($ch);
    $response = json_decode($output, true);

    curl_close($ch);


    //echo $output;
    //print_r($info);
    /*

    if ($info['http_code'] === 200) {
        header('Content-Type: ' . $info['content_type']);
        return $output;
    } else {
        return 'An error happened';
    }


}*/
?>


<div id="return-message">
<h1>Thanks, <?php echo $response['name']; ?>!</h1>
<p>Your ORCID <img src="http://orcid.org/sites/default/files/images/orcid_16x16.png" class="logo" width='16' height='16' alt="iD"/> is <?php echo $response['orcid']; ?></p>
<p><a href="http://sandbox.orcid.org/my-orcid" target="_blank">Go to your ORCID record</a></p>

<!--<button id="connect-orcid-demo" onclick="self.close ()">Close this Window</button>
<script type=text/javascript>

var oauthWindow;

function orcidOAUTH() {
    var oauthWindow = window.open("http://localhost:8080/oauth-redirect.html?client_id=0000-0003-2996-8827&response_type=code&scope=/authenticate&redirect_uri=http://support.orcid.org/knowledgebase/articles/409707", "_blank", "toolbar=no, scrollbars=yes, width=480, height=600, top=500, left=500");
}

function closeWindow() {
    oauthWindow.close();
}
</script>-->
	
	</body>
</html>