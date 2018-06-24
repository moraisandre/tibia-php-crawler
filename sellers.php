<?php
	//http://php.net/manual/en/class.domnode.php
	//json - T-Book

	//header('Content-type:application/json; charset=ISO-8859-1');
	header('Content-type:application/json; charset=utf-8');

	$sellerName = str_replace("\'", "%27", $_GET['name']);
	$sellerName = str_replace(" ", "%20", $_GET['name']);

	$itens = "null";
	$prices = "null";
	$description = "null";

	getSellerInfo($sellerName);

	echo "{";
	echo "\"npc name\":\"".$sellerName."\",";
	echo "\"description\":\"".$description."\",";
	echo "\"itens\":\"".$itens."\",";
	echo "\"prices\":\"".$prices."\"";
	echo "}";

	//end

	function getData($link, $query, $type) 
	{
		$html = file_get_contents($link);

		$document = new DOMDocument();

		// load html
		$document->loadHTML($html);
		echo $html;

		// create xpath selector
		$selector = new DOMXPath($document);

		$results = $selector->query($query);

		foreach($results as $node) {

			echo "teste";
			
			if ($type == 1) {
				return trim($node->parentNode->lastChild->nodeValue);
			}
			elseif ($type == 2) {
				return trim($node->parentNode->parentNode->lastChild->nodeValue);
			}
			elseif ($type == 3) {
				return $node->nodeValue;
			}
			elseif ($type == 4) {
				return $node->nodeValue;
			}
		}

		return "null";
	}

	function getSellerInfo($seller)
	{
		if ($seller == "Alesar") {
			$GLOBALS["itens"] = "Ancient Shield|Black Shield|Bonebreaker|Dark Armor|Dark Helmet|Dragon Hammer|Dreaded Cleaver|Earth Knight Axe|Energy Knight Axe|Fiery Knight Axe|Giant Sword|Haunted Blade|Icy Knight Axe|Knight Armor|Knight Axe|Knight Legs|Mystic Turban|Onyx Flail|Ornamented Axe|Poison Dagger|Scimitar|Serpent Sword|Skull Staff|Strange Helmet|Titan Axe|Tower Shield|Vampire Shield|Warrior Helmet";
			$GLOBALS["prices"] = "900|800|10000|400|250|2000|15000|2000|2000|2000|17000|8000|2000|5000|2000|5000|150|22000|20000|50|150|900|6000|500|4000|8000|15000|5000";
			$GLOBALS["description"] = "Green Djinn";
		}

		if ($seller == "Yaman") {
			$GLOBALS["itens"] = "Ankh|Dragon Necklace|Dwarven Ring|Energy Ring|Glacial Rod|Hailstorm Rod|Life Ring|Might Ring|Moonlight Rod|Muck Rod|Mysterious Fetish|Necrotic Rod|Northwind Rod|Protection Amulet|Ring of Healing|Strange Talisman|Silver Amulet|Snakebite Rod|Springsprout Rod|Terra Rod|Time Ring|Underworld Rod";
			$GLOBALS["prices"] = "100|100|100|100|6500|3000|50|250|200|6000|50|1000|1500|100|100|30|50|100|3600|2000|100|4400";
			$GLOBALS["description"] = "Green Djinn";
		}

		if ($seller == "Nah'Bob") {
			$GLOBALS["itens"] = "Angelic Axe|Blue Robe|Bonelord Shield|Boots of Haste|Broadsword|Butcher's Axe|Crown Armor|Crown Helmet|Crown Legs|Crown Shield|Crusader Helmet|Dragon Lance|Dragon Shield|Earth Spike Sword|Earth War Hammer|Energy Spike Sword|Energy War Hammer|Fiery Spike Sword|Fiery War Hammer|Fire Axe|Fire Sword|Glorious Axe|Guardian Shield|Ice Rapier|Icy Spike Sword|Icy War Hammer|Noble Armor|Obsidian Lance|Phoenix Shield|Queen's Sceptre|Royal Helmet|Shadow Sceptre|Spike Sword|Thaian Sword|War Hammer";
			$GLOBALS["prices"] = "5000|10000|1200|30000|500|18000|12000|2500|12000|8000|6000|9000|4000|1000|1200|1000|1200|1000|1200|8000|4000|3000|2000|1000|1000|1200|900|500|16000|20000|30000|10000|1000|16000|1200";
			$GLOBALS["description"] = "Blue Djinn";
		}

		if ($seller == "Haroun") {
			$GLOBALS["itens"] = "Axe Ring|Bronze Amulet|Club Ring|Elven Amulet|Garlic Necklace|Life Crystal|Magic Light Wand|Mind Stone|Orb|Power Ring|Stealth Ring|Stone Skin Amulet|Sword Ring|Wand of Cosmic Energy|Wand of Decay|Wand of Defiance|Wand of Draconia|Wand of Dragonbreath|Wand of Everblazing|Wand of Inferno|Wand of Starstorm|Wand of Voodoo|Wand of Vortex";
			$GLOBALS["prices"] = "100|50|100|100|50|50|35|100|750|50|200|500|100|2000|1000|6500|1500|200|6000|3000|3600|4400|100";
			$GLOBALS["description"] = "Blue Djinn";
		}

		if ($seller == "Rashid") {
			$GLOBALS["itens"] = "Abyss Hammer|Albino Plate|Amber Staff|Ancient Amulet|Assassin Dagger|Bandana|Beastslayer Axe|Beetle Necklace|Berserker|Blacksteel Sword|Blessed Sceptre|Bone Shield|Bonelord Helmet|Brutetamer's Staff|Buckle|Castle Shield|Chain Bolter|Chaos Mace|Cobra Crown|Coconut Shoes|Composite Hornbow|Cranial Basher|Crocodile Boots|Crystal Crossbow|Crystal Mace|Crystal Necklace|Crystal Ring|Crystal Sword|Crystalline Armor|Daramian Mace|Daramian Waraxe|Dark Shield|Death Ring|Demon Shield|Demonbone Amulet|Demonrage Sword|Devil Helmet|Diamond Sceptre|Divine Plate|Djinn Blade|Doll|Dragon Scale Mail|Dragon Slayer|Dragonbone Staff|Dreaded Cleaver|Dwarven Armor|Earth Blacksteel Sword|Earth Cranial Basher|Earth Crystal Mace|Earth Dragon Slayer|Earth Headchopper|Earth Heroic Axe|Earth Mystic Blade|Earth Orcish Maul|Earth Relic Sword|Earth War Axe|Elvish Bow|Emerald Bangle|Energy Blacksteel Sword|Energy Cranial Basher|Energy Crystal Mace|Energy Dragon Slayer|Energy Headchopper|Energy Heroic Axe|Energy Mystic Blade|Energy Orcish Maul|Energy Relic Sword|Energy War Axe|Epee|Fiery Blacksteel Sword|Fiery Cranial Basher|Fiery Crystal Mace|Fiery Dragon Slayer|Fiery Headchopper|Fiery Heroic Axe|Fiery Mystic Blade|Fiery Orcish Maul|Fiery Relic Sword|Fiery War Axe|Flower Dress|Flower Wreath|Fur Boots|Furry Club|Griffin Shield|Glacier Amulet|Glacier Kilt|Glacier Mask|Glacier Robe|Glacier Shoes|Gold Ring|Golden Armor|Golden Legs|Goo Shell|Guardian Halberd|Hammer of Wrath|Headchopper|Heavy Mace|Heavy Machete|Heavy Trident|Helmet of The Lost|Heroic Axe|Hibiscus Dress|Hieroglyph Banner|Horn (Ring)|Icy Blacksteel Sword|Icy Cranial Basher|Icy Crystal Mace|Icy Dragon Slayer|Icy Headchopper|Icy Heroic Axe|Icy Mystic Blade|Icy Orcish Maul|Icy Relic Sword|Icy War Axe|Jade Hammer|Krimhorn Helmet|Lavos Armor|Leaf Legs|Leopard Armor|Leviathan's Amulet|Light Shovel|Lightning Boots|Lightning Headband|Lightning Legs|Lightning Pendant|Lightning Robe|Lunar Staff|Magic Plate Armor|Magma Amulet|Magma Boots|Magma Coat|Magma Legs|Magma Monocle|Mammoth Fur Cape|Mammoth Fur Shorts|Mammoth Whopper|Mastermind Shield|Medusa Shield|Mercenary Sword|Model Ship|Mycological Bow|Mystic Blade|Naginata|Nightmare Blade|Noble Axe|Norse Shield|Orcish Maul|Oriental Shoes|Pair of Iron Fists|Paladin Armor|Patched Boots|Pharaoh Banner|Pharaoh Sword|Pirate Boots|Pirate Hat|Pirate Knee Breeches|Pirate Shirt|Pirate Voodoo Doll|Platinum Amulet|Ragnir Helmet|Relic Sword|Ring of the Sky|Royal Axe|Ruby Necklace|Ruthless Axe|Sacred Tree Amulet|Sapphire Hammer|Scarab Amulet|Scarab Shield|Shockwave Amulet|Silver Brooch|Silver Dagger|Skull Helmet|Skullcracker Armor|Spiked Squelcher|Steel Boots|Swamplair Armor|Taurus Mace|Tempest Shield|Terra Amulet|Terra Boots|Terra Hood|Terra Legs|Terra Mantle|The Justice Seeker|Tortoise Shield|Vile Axe|Voodoo Doll|War Axe|War Horn|Witch Hat|Wyvern Fang";
			$GLOBALS["prices"] = "20000|1500|8000|200|20000|150|1500|1500|40000|6000|40000|80|7500|1500|7000|5000|40000|9000|50000|500|25000|30000|1000|35000|12000|400|250|600|16000|110|1000|400|1000|30000|32000|36000|1000|3000|55000|15000|200|40000|15000|3000|10000|30000|6000|30000|12000|15000|6000|30000|30000|6000|25000|12000|2000|800|6000|30000|12000|15000|6000|30000|30000|6000|25000|12000|8000|6000|30000|12000|15000|6000|30000|30000|6000|25000|12000|1000|500|2000|1000|3000|1500|11000|2500|11000|2500|8000|20000|30000|4000|11000|30000|6000|50000|90|2000|2000|30000|3000|500|300|6000|30000|12000|15000|6000|30000|30000|6000|25000|12000|25000|200|16000|500|1000|3000|300|2500|2500|11000|1500|11000|5000|90000|1500|2500|11000|11000|2500|6000|850|300|50000|9000|12000|1000|35000|30000|2000|35000|10000|1500|6000|15000|4000|15000|2000|1000|23000|3000|1000|200|500|500|2500|400|25000|30000|40000|2000|45000|3000|7000|200|2000|3000|150|500|40000|18000|5000|30000|16000|500|35000|1500|2500|2500|11000|11000|40000|150|30000|400|12000|8000|5000|1500";
			$GLOBALS["description"] = "null";
		}

		if ($seller == "Rafzan") {
			$GLOBALS["itens"] = "Fishing Rod|Leather Harness|Life Preserver|Ratana|Rope|Shovel|Spike Shield|Spiky Club";
			$GLOBALS["prices"] = "30|750|300|500|8|2|250|300";
			$GLOBALS["description"] = "null";
		}

		if ($seller == "Yasir") {
			$GLOBALS["itens"] = "Acorn|Antlers|Ape Fur|Badger Fur|Bamboo Stick|Banana Sash|Basalt Fetish|Basalt Figurine|Bat Decoration|Bat Wing|Bear Paw|Behemoth Claw|Black Hood|Black Wool|Blazing Bone|Blood Preservation|Blood Tincture in a Vial|Bloody Dwarven Beard|Bloody Pincers|Blue Piece of Cloth|Boggy Dreads|Bola|Bone Fetish|Bone Shoulderplate|Bonecarving Knife|Bonelord Eye|Bony Tail|Book of Necromantic Rituals|Book of Prayers|Bowl of Terror Sweat|Brimstone Fangs|Brimstone Shell|Broken Crossbow|Broken Draken Mail|Broken Halberd|Broken Helmet|Broken Key Ring|Broken Ring of Ending|Broken Shamanic Staff|Broken Slicer|Broken Throwing Axe|Broken Visor|Brown Piece of Cloth|Bunch of Troll Hair|Bundle of Cursed Straw|Carniphila Seeds|Carrion Worm Fang|Cat's Paw|Centipede Leg|Cheese Cutter|Cheesy Figurine|Chicken Feather|Cliff Strider Claw|Cobra Tongue|Colourful Feather|Compass|Compound Eye|Corrupted Flag|Countess Sorrow's Frozen Tear|Crab Pincers|Crawler Head Plating|Cultish Mask|Cultish Robe|Cultish Symbol|Cursed Shoulder Spikes|Cyclops Toe|Damselfly Eye|Damselfly Wing|Dark Rosary|Dead Weight|Deepling Breaktime Snack|Deepling Claw|Deepling Guard Belt Buckle|Deepling Ridge|Deepling Scales|Deepling Warts|Deeptags|Demon Dust|Demon Horn|Demonic Finger|Demonic Skeletal Hand|Dirty Turban|Downy Feather|Dowser|Dracola's Eye|Dracoyle Statue|Dragon Claw|Dragon Priest's Wandtip|Dragon's Tail|Draken Sulphur|Draken Wristbands|Dung Ball|Earflap|Elder Bonelord Tentacle|Elven Astral Observer|Elven Hoof|Elven Scouting Glass|Elvish Talisman|Enchanted Chicken Wing|Essence of a Bad Dream|Eye of a Deepling|Eye of a Weeper|Eye of Corruption|Fiery Heart|Fir Cone|Fish Fin|Flask of Embalming Fluid|Flask of Warrior's Sweat|Frazzle Skin|Frazzle Tongue|Frost Giant Pelt|Frosty Ear of a Troll|Frosty Heart|Gauze Bandage|Geomancer's Robe|Geomancer's Staff|Golden Lotus Brooch|Ghastly Dragon Head|Ghostly Tissue|Ghoul Snack|Giant Eye|Girlish Hair Decoration|Gland|Glob of Acid Slime|Glob of Mercury|Glob of Tar|Gloom Wolf Fur|Goblin Ear|Golden Lotus Brooch|Goosebump Leather|Green Dragon Leather|Green Dragon Scale|Green Piece of Cloth|Hair of a Banshee|Half-Digested Piece of Meat|Half-Eaten Brain|Hardened Bone|Hatched Rorc Egg|Haunted Piece of Wood|Heaven Blossom|Hellhound Slobber|Hellspawn Tail|Hemp Rope|Hideous Chunk|High Guard Flag|Holy Ash|Holy Orchid|Honeycomb|Horoscope|Humongous Chunk|Hunter's Quiver|Hydra Head|Incantation Notes|Iron Ore|Jewelled Belt|Key to the Drowned Library|Kollos Shell|Kongra's Shoulderpad|Lancer Beetle Shell|Lancet|Legionnaire Flags|Lion's Mane|Lizard Essence|Lizard Leather|Lizard Scale|Lost Basher's Spike|Lost Bracers|Lost Husher's Staff|Luminous Orb|Lump of Dirt|Lump of Earth|Mad Froth|Magic Sulphur|Mammoth Tusk|Mantassin Tail|Marsh Stalker Beak|Marsh Stalker Feather|Minotaur Horn|Minotaur Leather|Miraculum|Mr. Punish's Handcuffs|Mutated Bat Ear|Mutated Flesh|Mutated Rat Tail|Mystical Hourglass|Necromantic Robe|Nettle Blossom|Nettle Spit|Noble Turban|Nose Ring|Orc Leather|Orc Tooth|Orcish Gear|Peacock Feather Fan|Pelvis Bone|Perfect Behemoth Fang|Petrified Scream|Piece of Archer Armor|Piece of Crocodile Leather|Piece of Dead Brain|Piece of Massacre's Shell|Piece of Scarab Shell|Piece of Swampling Wood|Piece of Warrior Armor|Pieces of Magic Chalk|Pig Foot|Pile of Grave Earth|Poison Spider Shell|Poisonous Slime|Polar Bear Paw|Pool of Chitinous Glue|Protective Charm|Purple Robe|Quara Bone|Quara Eye|Quara Pincers|Quara Tentacle|Red Dragon Leather|Red Dragon Scale|Red Hair Dye|Red Piece of Cloth|Rope Belt|Rorc Egg|Rorc Feather|Rotten Piece of Cloth|Sabretooth|Safety Pin|Sandcrawler Shell|Scale of Corruption|Scarab Pincers|Scorpion Tail|Scroll of Heroic Deeds|Scythe Leg|Sea Serpent Scale|Seeds|Shaggy Tail|Shamanic Hood|Sight of Surrender's Eye|Silencer Claws|Silencer Resonating Chamber|Silky Fur|Skeleton Decoration|Skull Belt|Skull Shatterer|Skunk Tail|Small Flask of Eyedrops|Small Notebook|Small Oil Lamp|Small Pitchfork|Snake Skin|Sniper Gloves|Soul Stone|Spellsinger's Seal|Spider Fangs|Spider Silk|Spidris Mandible|Spiked Iron Ball|Spirit Container|Spitter Nose|Spooky Blue Eye|Star Herb|Stone Herb|Stone Wing|Strand of Medusa Hair|Strange Symbol|Striped Fur|Swamp Grass|Swampling Moss|Swarmer Antenna|Tail of Corruption|Tarantula Egg|Tattered Piece of Robe|Tentacle Piece|Terramite Eggs|Terramite Legs|Terramite Shell|Terrorbird Beak|The Handmaiden's Protector|The Imperor's Trident|The Plasmother's Remains|Thick Fur|Thorn|Trapped Bad Dream Monster|Tooth File|Troll Green|Trollroot|Turtle Shell|Tusk|Undead Heart|Unholy Bone|Vampire Dust|Vampire Teeth|Vampire's Cape Chain|Venison|Warmaster's Wristguards|Warwolf Fur|Waspoid Claw|Waspoid Wing|Weaver's Wandtip|Werewolf Fur|White Piece of Cloth|Widow's Mandibles|Wimp Tooth Chain|Winged Tail|Winter Wolf Fur|Witch Broom|Wolf Paw|Wood|Wool|Wyrm Scale|Wyvern Talisman|Yellow Piece of Cloth|Yielowax|Zaogun Flag|Zaogun Shoulderplates";
			$GLOBALS["prices"] = "10|50|120|15|30|55|210|160|2000|50|100|2000|190|300|610|320|360|110|100|200|200|35|150|150|190|80|210|180|120|500|380|210|30|340|100|20|8000|4000|35|120|230|1900|100|30|800|50|35|2000|28|50|150|30|800|15|110|45|150|700|50000|35|210|280|150|500|320|55|25|20|48|450|90|430|230|360|80|180|290|300|1000|1000|80|120|20|35|50000|5000|8000|175|100|550|430|130|40|150|90|115|50|45|20000|360|150|650|390|375|25|150|30|10000|400|700|160|30|280|90|80|120|270|700|90|60|380|30|500|25|20|30|70|20|270|650|100|100|200|350|55|85|70|30|115|50|500|475|350|510|550|160|90|40|40|540|80|600|90|500|180|330|420|100|80|90|500|60|300|150|120|280|140|250|1000|10|130|80|8000|100|280|65|50|75|80|60|50000|420|50|150|700|250|75|25|430|2000|30|150|85|350|30|250|250|20|15|420|50000|45|30|50|210|10|25|10|50|30|480|60|110|500|350|410|140|200|200|40|300|66|120|70|30|400|120|20|680|280|25|230|450|520|150|25|45|3000|390|600|35|3000|80|170|50|95|480|150|70|400|2000|6000|280|10|100|450|100|40000|340|95|15|20|120|600|200|50|20|20|130|240|80|120|5000|50|60|170|95|50000|50000|50000|150|100|900|60|25|50|90|100|200|480|100|275|150|55|200|30|320|190|250|380|100|110|120|800|20|60|70|5|15|400|265|150|600|600|150";
			$GLOBALS["description"] = "null";
		}

		
	}


?>