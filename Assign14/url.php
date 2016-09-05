<?php
	
	$pagename = readline("Page name: ");
	$regex = '/[a-z0-9]+\b/i';
	preg_match_all($regex, $pagename, $matches);
	$matches = array_map('strtolower', $matches[0]);
	$url = implode('-', $matches);
	echo "URL: http://any_url.com/" . $url . "/ \n";
	
?>