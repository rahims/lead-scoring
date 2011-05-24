<?php
	require_once('include.php');

	$client = new TwilioRestClient(ACCOUNT_SID, AUTH_TOKEN);

	// Call the agent and put them in a conference room with the lead
	$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls', 'POST', array(
		'From' => FROM_NUMBER,
		'To' => AGENT,
		'Url' => BASE_URL.'conference.xml'
	));

	header('Content-type: text/xml');
?>
<Response>
	<Say voice="woman">Please wait while I connect you.</Say>
	<Dial>
		<!-- Put the lead in a conference room -->
		<Conference>lead_connect</Conference>
	</Dial>
</Response>
