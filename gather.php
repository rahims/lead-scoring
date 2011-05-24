<?php
	header('content-type: text/xml');
?>
<Response>
<Gather action="handle-gather.php?agent=<?php echo $_REQUEST['agent']; ?>&amp;lead=<?php echo $_REQUEST['lead']; ?>" numDigits="1">
		<Say voice="woman">Is this lead good?</Say>
	</Gather>
</Response>
