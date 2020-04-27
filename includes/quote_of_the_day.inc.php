<div class="w3-container w3-blue w3-center  w3-padding-16">
	<?php 
		$day = date('n/j');
		$quote_query = $db->query("SELECT * FROM quotes WHERE day='$day'");
		$quote_row = $quote_query->fetch_array();
	?>
    <h1 class="w3-margin w3-xlarge">Quote of the day:</h1>
	<p class="w3-large"><?php echo $quote_row['quote']; ?><br><span class="w3-small"><i> - <?php echo $quote_row['author']; ?></i></span></p>
</div>							