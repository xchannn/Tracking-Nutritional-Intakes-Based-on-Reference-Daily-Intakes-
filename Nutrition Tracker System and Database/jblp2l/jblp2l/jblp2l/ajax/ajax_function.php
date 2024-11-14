<?php
session_start();
require_once "../config_server.php";


function float2rat($n, $tolerance = 1.e-6) {
	$h1=1; $h2=0;
	$k1=0; $k2=1;
	$b = 1/$n;
	do {
		$b = 1/$b;
		$a = floor($b);
		$aux = $h1; $h1 = $a*$h1+$h2; $h2 = $aux;
		$aux = $k1; $k1 = $a*$k1+$k2; $k2 = $aux;
		$b = $b-$a;
	} while (abs($n-$h1/$k1) > $n*$tolerance);
  
	return "$h1/$k1";
  }

function float2fraction($float, $concat = ' '){
  
	// ensures that the number is float, 
	// even when the parameter is a string
	$float = (float)$float;
  
	if($float == 0 ){
	  return $float;
	}
	
	// when float between -1 and 1
	if( $float > -1 && $float < 0  || $float < 1 && $float > 0 ){
	  $fraction = float2rat($float);
	  return $fraction;
	}
	else{
  
	  // get the minor integer
	  if( $float < 0 ){
		$integer = ceil($float);
	  }
	  else{
		$integer = floor($float);
	  }
  
	  // get the decimal
	  $decimal = $float - $integer;
  
	  if( $decimal != 0 ){
  
		$fraction = float2rat(abs($decimal));
		$fraction = $integer . $concat . $fraction;
		return $fraction;
	  }
	  else{
		return $float;
	  }
	}
  }

if(isset($_GET['view_foodlists'])){
	
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";

	$result = $conn->query($sql);
	$datas = [];
	if ($result->num_rows > 0) {
		// output data of each row
		
		while($row = $result->fetch_assoc()) {
			$data = [];
            $data[] = strtoupper( $row['fc_foodname']);
            $data[] = strtoupper( $row['fc_energy']);
            $data[] = strtoupper( $row['fc_protein']);
            $data[] = strtoupper( $row['fc_fat']);
            $data[] = strtoupper( $row['fc_carbohydrate']);
            $data[] = strtoupper( $row['fc_calcium']);
			$data[] = strtoupper( $row['fc_phosphorus']);
            $data[] = strtoupper( $row['fc_iron']);
            $data[] = strtoupper( $row['fc_vitamina']);
            $data[] = strtoupper( $row['fc_thiamin']);
            $data[] = strtoupper( $row['fc_riboflavin']);
            $data[] = strtoupper( $row['fc_niacin']);
            $data[] = strtoupper( $row['fc_ascorbicacid']);
			// if($_SESSION['user_role'] == '1'){
			$data[] = '<div class="row">
						<div class="col-12">
							<div class="row">
								<div class="col-3">
									<i title="Edit" class=" text-success editFood" data-toggle="modal" data-target="#updateFoodModal" style="cursor: pointer;" data-id="'.$row["fc_id"].'"
									data-food_item="'.$row["fc_foodname"].'"
									data-energy="'.$row["fc_energy"].'"
									data-protein="'.$row["fc_protein"].'"
									data-fat="'.$row["fc_fat"].'"
									data-carbohydrates="'.$row["fc_carbohydrate"].'"
									data-calcium="'.$row["fc_calcium"].'"
									data-phosphorus="'.$row["fc_phosphorus"].'"
									data-iron="'.$row["fc_iron"].'"
									data-vitamina="'.$row["fc_vitamina"].'"
									data-thiamin="'.$row["fc_thiamin"].'"
									data-riboflavin="'.$row["fc_riboflavin"].'"
									data-niacin="'.$row["fc_niacin"].'"
									data-vitaminc="'.$row["fc_ascorbicacid"].'"
									>Edit </i> 
								</div>
								<div class="col-3">
									<i title="Remove" class=" text-danger removeFood" style="cursor: pointer;" data-id="'.$row["fc_id"].'">Remove</i>
								</div>
							</div>
						</div>
					</div>';
			// 	$data[// } else {
			// ] = "";
			// }
			$datas[] = $data;
		}
		
	} 
	
	echo json_encode($datas);
	
}

if(isset($_GET['view_foodlist'])){
	
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";

	$result = $conn->query($sql);
	$datas = [];
	if ($result->num_rows > 0) {
		// output data of each row
		
		while($row = $result->fetch_assoc()) {
			$data = [];
            $data[] = strtoupper( $row['fc_foodname']);
            $data[] = strtoupper( $row['fc_energy']);
            $data[] = strtoupper( $row['fc_protein']);
            $data[] = strtoupper( $row['fc_fat']);
            $data[] = strtoupper( $row['fc_carbohydrate']);
            $data[] = strtoupper( $row['fc_calcium']);
			$data[] = strtoupper( $row['fc_phosphorus']);
            $data[] = strtoupper( $row['fc_iron']);
            $data[] = strtoupper( $row['fc_vitamina']);
            $data[] = strtoupper( $row['fc_thiamin']);
            $data[] = strtoupper( $row['fc_riboflavin']);
            $data[] = strtoupper( $row['fc_niacin']);
            $data[] = strtoupper( $row['fc_ascorbicacid']);
			// 	$data[// } else {
			// ] = "";
			// }
			$datas[] = $data;
		}
		
	} 
	
	echo json_encode($datas);
	
}

if(isset($_GET['add_foodlists'])){
	$foodname = $_POST['food_item'];
	$energy = $_POST['energy'];
	$protein = $_POST['protein'];
	$fat = $_POST['fat'];
	$carbohydrate = $_POST['carbohydrates'];
	$calcium = $_POST['calcium'];
	$phosphorus = $_POST['phosphorus'];
	$iron = $_POST['iron'];
	$vitamina = $_POST['vitamina'];
	$thiamin = $_POST['thiamin'];
	$riboflavin = $_POST['riboflavin'];
	$niacin = $_POST['niacin'];
	$ascorbicacid = $_POST['vitaminc'];

	$sql = "INSERT INTO nutritiontracker_foodcomposition (fc_foodname, fc_energy, fc_protein, fc_fat, fc_carbohydrate, fc_calcium, fc_phosphorus, fc_iron, fc_vitamina, fc_thiamin, fc_riboflavin, fc_niacin, fc_ascorbicacid)
	VALUES ('".$foodname."','".$energy."','".$protein."', '".$fat."', '".$carbohydrate."', '".$calcium."', '".$phosphorus."', '".$iron."', '".$vitamina."', '".$thiamin."', '".$riboflavin."', '".$niacin."', '".$ascorbicacid."' )";

	if ($conn->query($sql) === TRUE) {
		echo json_encode("success");
	} else {
	  echo json_encode("Error: " . $sql . "<br>" . $conn->error);
	}
	
}

if(isset($_GET['update_foodlists'])){
	$id = $_POST['id'];
	$foodname = $_POST['food_item'];
	$energy = $_POST['energy'];
	$protein = $_POST['protein'];
	$fat = $_POST['fat'];
	$carbohydrate = $_POST['carbohydrates'];
	$calcium = $_POST['calcium'];
	$phosphorus = $_POST['phosphorus'];
	$iron = $_POST['iron'];
	$vitamina = $_POST['vitamina'];
	$thiamin = $_POST['thiamin'];
	$riboflavin = $_POST['riboflavin'];
	$niacin = $_POST['niacin'];
	$ascorbicacid = $_POST['vitaminc'];

	$sql = "UPDATE nutritiontracker_foodcomposition SET 
			`fc_foodname`='$foodname',
			`fc_energy`='$energy',
			`fc_protein`='$protein',
			`fc_fat`='$fat',
			`fc_carbohydrate`='$carbohydrate',
			`fc_calcium`='$calcium',
			`fc_phosphorus`='$phosphorus',
			`fc_iron`='$iron',
			`fc_vitamina`='$vitamina',
			`fc_thiamin`='$thiamin',
			`fc_riboflavin`='$riboflavin',
			`fc_niacin`='$niacin',
			`fc_ascorbicacid`='$ascorbicacid'
			 WHERE fc_id = '$id'";
	
	if ($conn->query($sql) === TRUE) {
		echo json_encode("success");
	} else {
	  echo json_encode("Error: " . $sql . "<br>" . $conn->error);
	}
	
}

if(isset($_GET['delete_foodlists'])){
	
	$id = $_POST['id'];

	$sql = "DELETE FROM nutritiontracker_foodcomposition WHERE fc_id='$id'";

	$result = $conn->query($sql);
	
}

if(isset($_GET['calculate_meal'])){
	$weight = ( floatval ( $_POST['weight'] ) * 2.2 );
	$height = $_POST['height'];
	$level = $_POST['level'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$bmr = null;
	$activity = null;
	$totalcalorierequire = null;

	$_SESSION['age'] = $age;
	$_SESSION['gender'] = $gender;

	if($gender == "Male"){
		$bmr = 66 + (6.23 * $weight) + (12.7 * $height) - (6.8 * $age);
	}else {
		$bmr = 655 + (4.35 * $weight) + (4.7 * $height) - (4.7 * $age);
	}

	if($level == "sedentary"){
		$activity = 1.2;
	}else if($level == "lightly"){
		$activity = 1.375;
	}else if($level == "moderately"){
		$activity = 1.55;
	}else if($level == "very"){
		$activity = 1.725;
	}else {
		$activity = 1.9;
	}
	// $poundsToKg = ( $weight * 0.45359237 );
	// $protein = ( $poundsToKg * 1.1 );
	$totalcalorierequire = $bmr * $activity;
	$calorie = $totalcalorierequire;
	$carb = ( $calorie * 0.65 ) / 4;
	$fat = ( $calorie * 0.20 ) / 9;
	$protein = ( $calorie * 0.15 ) / 4;
	
	$data['calories'] = number_format((float)$totalcalorierequire, 0, '.', '');
	$data['protein'] = number_format((float)$protein, 0, '.', '');	
	$data['carb'] = number_format((float)$carb, 0, '.', '');
	$data['fat'] = number_format((float)$fat, 0, '.', '');

	$vegCHO = 3;
	$vegCHONg = 1;
	$vegfat = 0;

	$fruitCHO = 10;
	$fruitCHONg = 0;
	$fruitfat = 0;

	$milkCHO = 12;
	$milkCHONg = 8;
	$milkfat = 10;

	$riceCHO = 23;
	$riceCHONg = 2;
	$ricefat = 0;

	$meatCHO = 0;
	$meatCHONg = 8;
	$meatfat = 6;

	$fatCHO = 0;
	$fatCHONg = 0;
	$fatfat = 5;

	$sugarCHO = 5;
	$sugarCHONg = 0;
	$sugarfat = 0;

	$totalCHO = 0;
	$totalCHONg = 0;
	$totalfat = 0;
	$vegEx = 0;
	$vegTotalCHO = 0;
	$vegTotalCHONg = 0;
	$vegTotalFat = 0;
	$fruitEx = 0;
	$fruitTotalCHO = 0;
	$fruitTotalCHONg = 0;
	$fruitTotalFat = 0;
	$milkEx = 0;
	$milkTotalCHO = 0;
	$milkTotalCHONg = 0;
	$milkTotalFat = 0;
	$riceEx = 0;
	$riceTotalCHO = 0;
	$riceTotalCHONg = 0;
	$riceTotalFat = 0;
	$meatEx = 0;
	$meatTotalCHO = 0;
	$meatTotalCHONg = 0;
	$meatTotalFat = 0;
	$fatEx = 0;
	$fatTotalCHO = 0;
	$fatTotalCHONg = 0;
	$fatTotalFat = 0;
	$sugarEx = 0;
	$sugarTotalCHO = 0;
	$sugarTotalCHONg = 0;
	$sugarTotalFat = 0;

	if( $totalCHO < $data['carb'] + 5 ){
		$vegEx = 3;
		$totalCHO += $vegCHO * $vegEx;
		$totalCHONg += $vegCHONg * $vegEx;
		$totalfat += $vegfat * $vegEx;

		$vegTotalCHO = $vegCHO * $vegEx;
		$vegTotalCHONg = $vegCHONg * $vegEx;
		$vegTotalfat = $vegfat * $vegEx;
	}

	if( $totalCHO < $data['carb'] + 5 ){
		$fruitEx = 4;
		$totalCHO += $fruitCHO * $fruitEx;
		$totalCHONg += $fruitCHONg * $fruitEx;
		$totalfat += $fruitfat * $fruitEx;

		$fruitTotalCHO =$fruitCHO * $fruitEx;
		$fruitTotalCHONg = $fruitCHONg * $fruitEx;
		$fruitTotalfat = $fruitfat * $fruitEx;
	}

	if( $totalCHO < $data['carb'] + 5 ){
		$milkEx = 1;
		$totalCHO += $milkCHO * $milkEx;
		$totalCHONg += $milkCHONg * $milkEx;
		$totalfat += $milkfat * $milkEx;

		$milkTotalCHO = $milkCHO * $milkEx;
		$milkTotalCHONg = $milkCHONg * $milkEx;
		$milkTotalfat = $milkfat * $milkEx;
	}

	if( $totalCHO < $data['carb'] + 5 ){
		$sugarEx = 3;

		$totalCHO += $sugarCHO * $sugarEx;
		$totalCHONg += $sugarCHONg * $sugarEx;
		$totalfat += $sugarfat * $sugarEx;

		$sugarTotalCHO = $sugarCHO * $sugarEx;
		$sugarTotalCHONg = $sugarCHONg * $sugarEx;
		$sugarTotalfat = $sugarfat * $sugarEx;
	}

	if( $totalCHO < $data['carb'] + 5 ){
		$riceEx = round( ($data['carb'] - $totalCHO ) / 23 );

		$totalCHO += $riceEx * $riceCHO;
		$totalCHONg += $riceEx * $riceCHONg;
		$totalfat += $riceEx * $ricefat;

		$riceTotalCHO = $riceEx * $riceCHO;
		$riceTotalCHONg = $riceEx * $riceCHONg;
		$riceTotalfat = $riceEx * $ricefat;

	}

	if( $totalCHONg < $data['protein'] + 5 ){
		$meatEx = round( ($data['protein'] - $totalCHONg ) / 8 );

		$totalCHO += $meatEx * $meatCHO;
		$totalCHONg += $meatEx * $meatCHONg;
		$totalfat += $meatEx * $meatfat;

		$meatTotalCHO = $meatEx * $meatCHO;
		$meatTotalCHONg = $meatEx * $meatCHONg;
		$meatTotalfat = $meatEx * $meatfat;

	}

	if( $totalfat < $data['fat'] + 5 ){
		$fatEx = round( (( $data['fat'] +5 ) - $totalfat ) / 5 );

		$totalCHO += $fatEx * $fatCHO;
		$totalCHONg += $fatEx * $fatCHONg;
		$totalfat += $fatEx * $fatfat;

		$fatTotalCHO = $fatEx * $fatCHO;
		$fatTotalCHONg = $fatEx * $fatCHONg;
		$fatTotalfat = $fatEx * $fatfat;

	}

	$data['totalVegCalorie'] = ( $vegTotalCHO * 4 ) + ( $vegTotalCHONg * 4 ) + ( $vegTotalfat * 9 );
	$data['totalSugarCalorie'] = ( $sugarTotalCHO * 4 ) + ( $sugarTotalCHONg * 4 ) + ( $sugarTotalfat * 9 );
	$data['totalRiceCalorie'] = ( $riceTotalCHO * 4 ) + ( $riceTotalCHONg * 4 ) + ( $riceTotalfat * 9 );
	$data['totalMilkCalorie'] = ( $milkTotalCHO * 4 ) + ( $milkTotalCHONg * 4 ) + ( $milkTotalfat * 9 );
	$data['totalFruitCalorie'] = ( $fruitTotalCHO * 4 ) + ( $fruitTotalCHONg * 4 ) + ( $fruitTotalfat * 9 );
	$data['totalMeatCalorie'] = ( $meatTotalCHO * 4 ) + ( $meatTotalCHONg * 4 ) + ( $meatTotalfat * 9 );
	$data['totalFatCalorie'] = ( $fatTotalCHO * 4 ) + ( $fatTotalCHONg * 4 ) + ( $fatTotalfat * 9 );
	$data['totalCalorie'] = $data['totalVegCalorie'] + $data['totalSugarCalorie'] + $data['totalRiceCalorie'] + $data['totalMilkCalorie'] + $data['totalFruitCalorie'] + $data['totalMeatCalorie'] + $data['totalFatCalorie'];

	$data['totalCHO'] = $totalCHO;
	$data['totalCHONg'] = $totalCHONg;
	$data['totalfat'] = $totalfat;

	$data['vegEx'] = $vegEx;
	$data['vegTotalCHO'] = $vegTotalCHO;
	$data['vegTotalCHONg'] = $vegTotalCHONg;
	$data['vegTotalfat'] = $vegTotalfat;

	$data['fruitEx'] = $fruitEx;
	$data['fruitTotalCHO'] = $fruitTotalCHO;
	$data['fruitTotalCHONg'] = $fruitTotalCHONg;
	$data['fruitTotalfat'] = $fruitTotalfat;

	$data['milkEx'] = $milkEx;
	$data['milkTotalCHO'] = $milkTotalCHO;
	$data['milkTotalCHONg'] = $milkTotalCHONg;
	$data['milkTotalfat'] = $milkTotalfat;

	$data['sugarEx'] = $sugarEx;
	$data['sugarTotalCHO'] = $sugarTotalCHO;
	$data['sugarTotalCHONg'] = $sugarTotalCHONg;
	$data['sugarTotalfat'] = $sugarTotalfat;

	$data['riceEx'] = $riceEx;
	$data['riceTotalCHO'] = $riceTotalCHO;
	$data['riceTotalCHONg'] = $riceTotalCHONg;
	$data['riceTotalfat'] = $riceTotalfat;

	$data['meatEx'] = $meatEx;
	$data['meatTotalCHO'] = $meatTotalCHO;
	$data['meatTotalCHONg'] = $meatTotalCHONg;
	$data['meatTotalfat'] = $meatTotalfat;

	$data['fatEx'] = $fatEx;
	$data['fatTotalCHO'] = $fatTotalCHO;
	$data['fatTotalCHONg'] = $fatTotalCHONg;
	$data['fatTotalfat'] = $fatTotalfat;

	$data['breakfast'] = array();
	$data['lunch'] = array();
	$data['dinner'] = array();

	$riceDis = ( $riceEx / 3 );
	$data['breakfast'][] = float2fraction( ( ( round($riceDis) < 0.5 ) ? 1 : round($riceDis) ) / 2 ) .' '.getRice().'</br>';
	$data['lunch'][] = float2fraction( ( ( round($riceDis) < 0.5 ) ? 1 : round($riceDis) ) / 2 ).' '.getRice().'</br>';
	$data['dinner'][] = float2fraction( ( ( round($riceDis) < 0.5 ) ? 1 : round($riceDis) ) / 2 ).' '.getRice().'</br>';

	$vegeDis = ( $vegEx / 3 );
	$data['breakfast'][] = ( ( round($vegeDis) < 0.5 ) ? 1 : round($vegeDis) ).' '.getVegetable().'</br>';
	$data['lunch'][] = ( ( round($vegeDis) < 0.5 ) ? 1 : round($vegeDis) ).' '.getVegetable().'</br>';
	$data['dinner'][] = ( ( round($vegeDis) < 0.5 ) ? 1 : round($vegeDis) ).' '.getVegetable().'</br>';

	$fruitDis = ( $fruitEx / 4 );
	$data['breakfast'][] = ( ( round($fruitDis) < 0.5 ) ? 1 : round($fruitDis) ).' '.getFruit().'</br>';
	$data['lunch'][] = ( ( round($fruitDis) < 0.5 ) ? 1 : round($fruitDis) ).' '.getFruit().'</br>';
	$data['dinner'][] =( ( round($fruitDis) < 0.5 ) ? 1 : round($fruitDis) ).' '.getFruit().'</br>';
	$data['snack'][] = ( ( round($fruitDis) < 0.5 ) ? 1 : round($fruitDis) ).' '.getFruit().'</br>';

	$meatDis = ( $meatEx / 3 );
	$data['breakfast'][] = ( ( round($meatDis) < 0.5 ) ? 1 : round($meatDis) ).' '.getMeat().'</br>';
	$data['lunch'][] =  ( ( round($meatDis) < 0.5 ) ? 1 : round($meatDis) ).' '.getMeat().'</br>';
	$data['dinner'][] = ( ( round($meatDis) < 0.5 ) ? 1 : round($meatDis) ).' '.getMeat().'</br>';

	$fatDis = ( $fatEx / 4 );
	$data['breakfast'][] = ( ( round($fatDis) < 0.5 ) ? 1 : round($fatDis) ).' '.getFat().'</br>';
	$data['lunch'][] = ( ( round($fatDis) < 0.5 ) ? 1 : round($fatDis) ).' '.getFat().'</br>';
	$data['dinner'][] =  ( ( round($fatDis) < 0.5 ) ? 1 : round($fatDis) ).' '.getFat().'</br>';
	$data['snack'][] =  ( ( round($fatDis) < 0.5 ) ? 1 : round($fatDis) ).' '.getFat().'</br>';

	$sugarDis = ( $sugarEx / 4 );
	$data['breakfast'][] =  ( ( round($sugarDis) < 0.5 ) ? 1 : round($sugarDis) ).' '.getSugar().'</br>';
	$data['lunch'][] =  ( ( round($sugarDis) < 0.5 ) ? 1 : round($sugarDis) ).' '.getSugar().'</br>';
	$data['dinner'][] =  ( ( round($sugarDis) < 0.5 ) ? 1 : round($sugarDis) ).' '.getSugar().'</br>';
	$data['snack'][] =  ( ( round($sugarDis) < 0.5 ) ? 1 : round($sugarDis) ).' '.getSugar().'</br>';	
	$data['breakfast'][] =  ( ( round($sugarDis) < 0.5 ) ? 1 : round($sugarDis) ).' '.getMilk().'</br>';


	echo json_encode($data);
	
}

if(isset($_GET['login'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM accounts WHERE account_username='$username' AND account_password='$password' AND account_type='admin' ";

	$result = $conn->query($sql);

	if( $result->num_rows >= 1){
		$_SESSION["islogin"] = true;
		echo "success";
	}else {
		echo "error";
	}
	
}

function getVegetable() {
	$data = [
		'Vegetable'
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}

function getMeat() {
	$data = [
		'Meat'
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}

function getSugar() {
	$data = [
		'Sugar'
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}

function getFat() {
	$data = [
		'Fat'
		
		
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}

function getMilk() {
	$data = [
		'Milk'
	
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}

function getRice() {
	$data = [
		'Rice',
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}

function getFruit() {
	$data = [
		'Fruit'
	];

	$randomNumber = rand( 0, (count( $data )-1) );

	return $data[$randomNumber];
}



if(isset($_GET['logout'])){

	$_SESSION["islogin"] = false;
	
}