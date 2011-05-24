<?php
	require_once('twilio.php');

	// Your Account SID and Auth Token. You can find these values at the bottom left of your Twilio Dashboard.
	define('ACCOUNT_SID', 'ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
	define('AUTH_TOKEN', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');

	// The number that should appear as the caller ID when the agent is called. Must be a Twilio phone number or a number you have already validated with Twilio.
	define('FROM_NUMBER', '+1YYYYYYYYYY');

	// The phone number of the agent that will be called.
	define('AGENT', '+1ZZZZZZZZZZ');

	// The full URL of this folder on your web server.
	define('BASE_URL', 'http://www.yourserver.com/lead-scoring/');

	// The Twilio API version. No need to change this.
	define('API_VERSION', '2010-04-01');
?>
