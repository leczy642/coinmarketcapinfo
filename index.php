<!-- let's create our simple HTML form here -->

<form method = "post" action ="">
<input type ="text" name ="currency" value = "" placeholder = "enter the appropriate coin name here"/>
<input type = "submit" name = "submit" value ="search"/><br/><br/>
</form>

<?php 
error_reporting (E_ALL & ~E_NOTICE & ~E_WARNING);

//set the form variable to post the currency
$curreny = $_POST['currency'];

if(isset($_POST['submit'])){
	
			$file_path ="https://api.coinmarketcap.com/v1/ticker/".$curreny;// path to your JSON file
			$data = file_get_contents($file_path); // put the contents of the file into a variable
			$coin_info = json_decode($data); // decode the JSON feed
	
		//use a foreach loop to traverse the JSON array
		foreach ($coin_info as $coin) {

			$coin_name = $coin -> name; //set the coin name 
			$coin_price=$coin->price_usd; // set the price here instead
			$coin_rank = $coin -> rank; //display the rank
			$coin_available_supply = $coin -> available_supply; //set the available supply
		}
				//displaying the coin information
			echo ("<b>---COINMARKETCAP INFO---</b><br/>");
			echo ("NAME -->".$coin_name."<br/>");
			echo ("SBD PRICE -->".$coin_price."<br/>");
			echo ("RANK -->".$coin_rank."<br/>");
			echo ("AVAILABLE SUPPLY -->".$coin_available_supply."<br/>");

	}

?>
