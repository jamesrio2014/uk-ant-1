<?php
/**
 * Campaign: GoogleTestingDisplay_1
 * Created: 2022-01-04 15:01:16 UTC
 */

require 'leadcloak-163cn4klhaz9.php';

// ---------------------------------------------------
// Configuration

// Set this to false if application is properly installed.
$enableDebugging = false;

// Set this to false if you won't want to log error messages
$enableLogging = true;

if ($enableDebugging) {
	isApplicationReadyToRun();
}

$data = httpRequestMakePayload($campaignId, $campaignSignature);

$response = httpRequestExec($data);

$handler = httpHandleResponse($response, $enableLogging);

if ($handler) {
	exit();
}

?>
