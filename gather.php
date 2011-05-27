<?php
	header('content-type: text/xml');
?>
<Response>
	<Gather action="handle-gather.php?agent=<?php echo $_REQUEST['agent']; ?>&amp;lead=<?php echo $_REQUEST['lead']; ?>" numDigits="1" timeout="15">
		<Say voice="woman">Is this a good lead? Press 1 to accept the lead. Press any other key to reject the lead.</Say>
	</Gather>
	<Say voice="woman">I didn't receive any input.</Say>
	<Redirect method="GET">gather.php?agent=<?php echo $_REQUEST['agent']; ?>&amp;lead=<?php echo $_REQUEST['lead']; ?></Redirect>
</Response>
