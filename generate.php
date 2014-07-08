<?php

$lexicon = file("lexicon.txt");
define("SEP_SPACE", 0);
define("SEP_NONE", 1);
define("SEP_CAMEL", 2);
define("SEP_SNAKE", 3);
define("SEP_HYP", 4);

function generatePwd($amt, $num, $sym, $upFirst, $separation) {
	$pwd = generateWord($upFirst);
	
	for($i=1;$i<$amt;$i++){
		switch($separation){
		case SEP_NONE:
			$pwd .= generateWord(false);
			break;
		case SEP_CAMEL:
			$pwd .= generateWord(true);
			break;
		case SEP_SNAKE:
			$pwd .= "_" . generateWord(false);
			break;
		case SEP_HYP:
			$pwd .= "-" . generateWord(false);
			break;
		case SEP_SPACE:
			$pwd .= " " . generateWord(false);
			break;
		}
	}
	
	if($num)
		$pwd .= rand(0, 9);
	if($sym)
		$pwd .= generateSymbol();
	
	return $pwd;
}

function generateWord($capFirst) {
	global $lexicon;
	$word = trim($lexicon[rand(0, count($lexicon))]);
	if($capFirst)
		return ucfirst($word);
	else
		return strtolower($word);
}

function generateSymbol() {
	$symbols = '`~!@#$%^&*()-_+={}[]\|;:"?/><.,';
	$pos = rand(0, strlen($symbols));
	return substr($symbols, $pos, 1);
}

?>