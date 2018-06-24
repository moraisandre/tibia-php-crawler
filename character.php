<?php
	//http://php.net/manual/en/class.domnode.php
	//json - T-Book

	//header('Content-type:application/json; charset=ISO-8859-1');
	header('Content-type:application/json; charset=utf-8');

	$characterName = str_replace("\'", "%27", $_GET['name']);
	$characterName = str_replace(" ", "%20", $_GET['name']);

	$siteLink = 'http://www.tibia.com/community/?subtopic=characters&name='.$characterName;

	echo "{";
	//Character Information
	echo "\"name\":\"".getData($siteLink, '//td[text()="Name:"]', 1)."\",";
	echo "\"sex\":\"".getData($siteLink, '//td[text()="Sex:"]', 1)."\",";
	$vocation = getData($siteLink, '//td[text()="Vocation:"]', 1);
	echo "\"vocation\":\"".$vocation."\",";
	$level = getData($siteLink, '//td[text()="Level:"]', 1);
	echo "\"level\":\"".$level."\",";
	echo "\"achievement points\":\"".getData($siteLink, '//nobr[text()="Achievement Points:"]', 2)."\",";
	echo "\"world\":\"".getData($siteLink, '//td[text()="World:"]', 1)."\",";
	echo "\"residence\":\"".getData($siteLink, '//td[text()="Residence:"]', 1)."\",";
	echo "\"house\":\"".getData($siteLink, '//td[text()="House:"]', 1)."\",";
	echo "\"married to\":\"".getData($siteLink, '//td[text()="Married to:"]', 1)."\",";
	echo "\"guild membership\":\"".getData($siteLink, "//td[starts-with(text(),'Guild')]", 1)."\",";
	echo "\"last login\":\"".getData($siteLink, '//td[text()="Last login:"]', 1)."\",";
	$comment = getData($siteLink, '//td[text()="Comment:"]', 1);
	$comment = str_replace("\n", "", $comment);
	$comment = str_replace(chr(13), "\\n", $comment);
	$comment = str_replace("\"", "\\\"", $comment);
	echo "\"comment\":\"".$comment."\",";
	echo "\"account status\":\"".getData($siteLink, "//td[starts-with(text(),'Account')]", 1)."\",";

	//Account Information
	echo "\"loyalty title\":\"".getData($siteLink, '//td[text()="Loyalty Title:"]', 1)."\",";
	echo "\"created\":\"".getData($siteLink, '//td[text()="Created:"]', 1)."\",";
	
	//More Info
	echo "\"hp\":\"".getHP($level, $vocation)."\",";
	echo "\"mana\":\"".getMana($level, $vocation)."\",";
	echo "\"cap\":\"".getCap($level, $vocation)."\",";
	echo "\"party\":\"".getPartyRange($level)."\",";
	echo "\"source\":\"Tibia\"";
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

	function getHP($level, $vocation)
	{	
		$hp = 0;

		if ($vocation == "Sorcerer" || $vocation == "Master Sorcerer" ||
			$vocation == "Druid" || $vocation == "Elder Druid" ||
			$vocation == "None")
		{
			$hp = (5 * ($level + 29));
		}

		elseif ($vocation == "Paladin" || $vocation == "Royal Paladin")
		{
			$hp = 5 * (2 * $level - 8 + 29);
		}

		elseif ($vocation == "Knight" || $vocation == "Elite Knight")
		{
			$hp = 5 * (3 * $level - 2 * 8 + 29);
		}

		return $hp;
	}

	function getMana($level, $vocation)
	{	
		$mana = 0;

		if ($vocation == "Sorcerer" || $vocation == "Master Sorcerer" ||
			$vocation == "Druid" || $vocation == "Elder Druid")
		{
			$mana = 5 * (6 * $level - 5 * 8);
		}

		elseif ($vocation == "Paladin" || $vocation == "Royal Paladin")
		{
			$mana = 5 * (3 * $level - 2 * 8);
		}

		elseif ($vocation == "Knight" || $vocation == "Elite Knight" ||
			$vocation == "None")
		{
			$mana = 5 * $level;
		}

		return $mana;
	}

	function getCap($level, $vocation)
	{	
		$cap = 0;

		if ($vocation == "Sorcerer" || $vocation == "Master Sorcerer" ||
			$vocation == "Druid" || $vocation == "Elder Druid" ||
			$vocation == "None")
		{
			$cap = 10 * ($level + 39);
		}

		elseif ($vocation == "Paladin" || $vocation == "Royal Paladin")
		{
			$cap = 10 * (2 * $level - 8 + 39);
		}

		elseif ($vocation == "Knight" || $vocation == "Elite Knight")
		{
			$cap = 5 * (5 * $level - 5 * 8 + 94);
		}

		return $cap;
	}

	function getPartyRange($level)
	{
		$partyMin = ceil($level * 2/3);
		$partyMax = ceil($level / 2*3);

		return $partyMin." - ".$partyMax;
	}

?>