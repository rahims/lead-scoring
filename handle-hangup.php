<?php
	require_once('include.php');

	$client = new TwilioRestClient(ACCOUNT_SID, AUTH_TOKEN);

	// Someone hung up, so hang the other person up as well.
	if ($_REQUEST['CallStatus'] == 'completed')
	{
		// Find out who's still on the call
		$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls', 'GET', array(
			'Status' => 'in-progress'
		));

		if (!$response->IsError) {
			foreach ($response->ResponseXml->Calls->Call as $call)
			{
				if ($call->To == AGENT)
				{
					$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls/'.$call->Sid, 'POST', array(
						'Url' => BASE_URL.'lead-hungup.xml'
					));
				}
				else if ($call->To == FROM_NUMBER)
				{
					$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls/'.$call->Sid, 'POST', array(
						'Url' => BASE_URL.'agent-hungup.xml'
					));
				}
			}
		}
	}
?>
