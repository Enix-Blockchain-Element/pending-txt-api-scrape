<?php

getTotalItems('https://explorer.enix.ai/pending_transactions?type=JSON');

function getTotalItems($url, $counter = 0){
	
	//echo $url . ' => ';
	
	$url_contents = json_decode(file_get_contents($url));
	
	$counter = $counter + count($url_contents->items);
	//echo $counter . '<br />';
	
	if($url_contents->next_page_path != ""){
		
		getTotalItems('https://explorer.enix.ai' . $url_contents->next_page_path . '&type=JSON', $counter);
		
	} else {
		
		file_put_contents('pending_transactions.txt', $counter);
		
	}
	
}

?>