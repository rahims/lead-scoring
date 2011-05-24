<?php
	require_once('include.php');

	header('Content-type: text/xml');

	$agent = $_REQUEST['agent'];
	$lead = $_REQUEST['lead'];

	$client = new TwilioRestClient(ACCOUNT_SID, AUTH_TOKEN);

	// Agent likes the lead
	if ($_REQUEST['Digits'] == '1')
	{
		// Agent likes the lead, so put them back in a conference together
		$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls/'.$agent, 'POST', array(
			'Url' => BASE_URL.'conference.xml'
		));

		if ($response->IsError) {
			echo '<Response><Say>'.$response->ErrorMessage.'</Say></Response>';
		}
	}
	// Agent doesn't like the lead
	else {
		echo '<Response><Say voice="woman">Sorry about that. Disconnecting you.</Say><Hangup /></Response>';

		// Hang the lead up
		$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls/'.$lead, 'POST', array(
			'Url' => BASE_URL.'reject.xml'
		));
	}
?>
