<?php

require("generate.php");

if(!isset($_POST["submit"]))
	$pwd = generatePwd(4, false, false, false, SEP_SPACE);
else {
	if($_POST["amt"] < 1 || $_POST["amt"] > 50)
		$pwd = "Please use a reasonable amount of words";
	else
		$pwd = generatePwd($_POST["amt"], isset($_POST["num"]), isset($_POST["sym"]), 
						   isset($_POST["up"]), $_POST["sep"]);
}

$dAmt = isset($_POST["amt"])?$_POST["amt"]:4;
$dSep = isset($_POST["sep"])?$_POST["sep"]:0;
$dNum = isset($_POST["dNum"]);
$dSym = isset($_POST["dSym"]);;
$dUp = isset($_POST["dUp"]);;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Word Based Password Generator</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    
    <body>
        <div id="wrap">
            <h1 id="title">Word Based Password Generator</h1>
			<p>Generate a password based off a sequence of words instead of random confusing symbols,
				in order to create a password that is not only more secure but also easier to remember.</p>
            <h2 id="pwd"><?=$pwd?></h2>
			
			<h3>Settings</h3>
			<form method="POST" action="<?=$_SERVER['PHP_SELF']?>" id="settings">
				<p><label for="amt">Amount of words: 
					<input type="number" name="amt" min="1" max="15" value="<?=$dAmt?>" /></label></p>
				<p>
					<label for="sep">Word Separation: 
						<select name="sep">
							<option value="0" <?php if($dSep==0) echo 'selected="selected"'; ?>>Spaces</option>
							<option value="1" <?php if($dSep==1) echo 'selected="selected"'; ?>>None</option>
							<option value="2" <?php if($dSep==2) echo 'selected="selected"'; ?>>camelCase</option>
							<option value="3" <?php if($dSep==3) echo 'selected="selected"'; ?>>snake_case</option>
							<option value="4" <?php if($dSep==4) echo 'selected="selected"'; ?>>Hyphens</option>
						</select>
					</label>
				</p>
				<p><label for="num"><input type="checkbox" name="num" <?php if($dNum) echo 'checked="checked"'; ?> />
					Include number at end</label></p>
				<p><label for="sym"><input type="checkbox" name="sym" />
					Include symbol at end</label></p>
				<p><label for="up"><input type="checkbox" name="up" />
					Start with an uppercase letter</label></p>
				<input type="submit" name="submit" value="Generate" />
			</form>
			
			<div id="footer">
				<img src="images/littlelogo.png" alt="Egansoft logo" id="logo" />
				<div id="footerText">
					<p>Inspired by xkcd #936, <a href="http://xkcd.com/936/" target="_blank">Password Strength</a></p>
					<p>Developed by Nicholas Egan at <a href="http://www.egansoft.com/" target="_blank">Egansoft</a></p>
					<p>Lexicon from the <a href="http://elexicon.wustl.edu/" target=_blank>English Lexicon Project</a></p>
				</div>
			</div>
        </div>
    </body>
</html>