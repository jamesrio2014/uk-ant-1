<?php
/**
 * Campaign: GoogleTestingDisplay_1
 * Created: 2022-01-04 15:01:16 UTC
 */

require 'leadcloak-163cn4klhaz9.php';

// ---------------------------------------------------
// Configuration

// Set this to false if application is properly installed.
$enableDebugging = true;

// Set this to false if you won't want to log error messages
$enableLogging = true;

// Set this to true if want to use landing page rotator
$useLPR = false;

// Set this to the location of the bot page you want to display
$pathToBotPage = '/clean.php';

// Set this to the location of the landing page you want to display
$pathToLandingPage = '/real.php';

// Allows for modded query strings
$myQueryString = [];

parse_str($_SERVER['QUERY_STRING'], $myQueryString);

/**
 *  Add or Modify Query String Variables in the section below.
 *  WARNING: Variables with the same name will be re-written
 */
// Ex.: $myQueryString['my_custom_variable'] = 'my custom variable';

if ($enableDebugging) {
	isApplicationReadyToRun();
}

$data = httpRequestMakePayload($campaignId, $campaignSignature, $useLPR);

$response = httpRequestExec($data);

$handler = httpHandleResponse($response, $enableLogging);

if ($useLPR) {
	if ($handler) {
		require $handler;
		exit();
	}
	header("HTTP/1.0 404 Not Found");
	exit();
} else {
	if ($handler) {
		require $pathToLandingPage;
		exit();
	} else {
		require $pathToBotPage;
		exit();
	}
}
?>
