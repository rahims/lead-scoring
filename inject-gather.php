<?php
	require_once('include.php');

	$client = new TwilioRestClient(ACCOUNT_SID, AUTH_TOKEN);

	// Get the call SIDs of each caller
	$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls', 'GET', array(
		'Status' => 'in-progress'
	));

	if ($response->IsError) {
		echo 'Error: '.$response->ErrorMessage;
	}
	else {
		foreach ($response->ResponseXml->Calls->Call as $call)
		{
			if ($call->To == AGENT)
			{
				$agent = $call->Sid;
			}
			else if ($call->To == FROM_NUMBER)
			{
				$lead = $call->Sid;
			}
		}
	}

	if ( (strlen($agent) == 34) && (strlen($agent) == 34) )
	{
		echo 'Injecting &lt;Gather&gt;<br>';

		// Place the lead on hold
		$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls/'.$lead, 'POST', array(
			'Url' => BASE_URL.'hold.xml'
		));

		// The lead has been put in the conference room, get their new call SID.
		$lead = $response->ResponseXml->Call->Sid;
	
		// Inject a gather for the agent
		$response = $client->request('/'.API_VERSION.'/Accounts/'.ACCOUNT_SID.'/Calls/'.$agent, 'POST', array(
			'Url' => BASE_URL.'gather.php?agent='.$agent.'&lead='.$lead
		));
	}
?>
