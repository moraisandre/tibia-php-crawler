<?php
	//http://php.net/manual/en/class.domnode.php
	//json - T-Book

	//header('Content-type:application/json; charset=ISO-8859-1');
	header('Content-type:application/json; charset=utf-8');

	$characterName = str_replace("\'", "%27", $_GET['name']);
	$characterName = str_replace(" ", "%20", $_GET['name']);

	$siteLink = 'http://guildstats.eu/character?nick='.$characterName;
	$tibiaLink = 'http://www.tibia.com/community/?subtopic=characters&name='.$characterName;

	echo "{";
	echo "\"name\":\"".getData($siteLink, '//h1[@style="display: inline; vertical-align: middle;"]', 3)."\",";
	echo "\"last login\":\"".getData($tibiaLink, '//td[text()="Last login:"]', 1)."\",";
	$status = getData($siteLink, '//td[text()="Online:"]', 2);
	$status = str_replace("\n", "", $status);
	$status = str_replace("\t", "", $status);
	$status = str_replace(chr(13), "", $status);
	$status = str_replace("Online:", "", $status);
	echo "\"status\":\"".$status."\",";
	echo "\"source\":\"GuildStats/Tibia\"";
	echo "}";

	//end


	function getData($link, $query, $type) 
	{
		libxml_use_internal_errors(true);

		$html = file_get_contents($link);

		$document = new DOMDocument();

		// load html
		$document->loadHTML($html);

		// create xpath selector
		$selector = new DOMXPath($document);

		$results = $selector->query($query);

		foreach($results as $node) {
			
			if ($type == 1) {
				return trim($node->parentNode->lastChild->nodeValue);
			}
			elseif ($type == 2) {
				return trim($node->parentNode->parentNode->lastChild->nodeValue);
			}
			elseif ($type == 3) {
				return $node->nodeValue;
			}
		}

		return "null";
	}

?>
