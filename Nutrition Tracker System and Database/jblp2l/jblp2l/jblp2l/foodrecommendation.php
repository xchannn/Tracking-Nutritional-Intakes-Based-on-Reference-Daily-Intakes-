<?php
session_start();
$islogin = false;
$age = null;
$gender = null;
if (isset($_SESSION["islogin"])) {
	$islogin = $_SESSION["islogin"];
}

if (isset($_SESSION["age"])) {
	$age = $_SESSION["age"];
}

if (isset($_SESSION["gender"])) {
	$gender = $_SESSION["gender"];
}

?>
<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="NutritionTrackerLogo.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="config_design.css">
	<title>Nutrition Tracker</title>
	<script src="jquery.min.js"></script>
	<script src="jquery.session.js"></script>
	<script src="functions.js"></script>
	<script src="compare1.js"></script>
	<script>
		function searchfunction() {
			searchbox();
		}

		function searchfunction2() {
			searchbox2();
		}

		function searchfunction3() {
			searchbox3();
		}

		function recommend() {
			$("#rcheader").html("Food recommendations:");
			recommendation1();
		}

		function newevent() {
			age = $("#ages :selected").text();
			gender = $("input[name='gender-option']:checked").val();
			$("#agerange").html(age);
			$('#gender').html(gender);
			$('#healthrisks_header').show();
			$('#recommendations').show();
		};

		function newevent1() {
			age = $("#ages :selected").text();
			gender = $('#gender').text();
			energy = $('#total_energy').text();
			protein = $('#total_protein').text();
			vitamina = $('#total_vitamina').text();
			ascorbicacid = $('#total_ascorbicacid').text();
			thiamin = $('#total_thiamin').text();
			riboflavin = $('#total_riboflavin').text();
			niacin = $('#total_niacin').text();
			calcium = $('#total_calcium').text();
			iron = $('#total_iron').text();
			fat = $('#total_fat').text();
			phosphorus = $('#total_phosphorus').text();
			carbohydrates = $('#total_carbohydrates').text();
			$('#healthrisks').html("");
			compare(energy, protein, fat, carbohydrates, calcium, iron, vitamina, thiamin, riboflavin, niacin, ascorbicacid, age, gender);
			$('#healthrisks_header').show();
			$('#recommendations').show();
		};
		window.onload = function() {
			sessionvariable = sessionStorage.getItem('id');
			sessionvariable1 = $.session.get('id');
			if (sessionvariable = "false" && sessionvariable == null) {
				$("#sessionid").load("operation_new-session.php");
				$("#warning").show();
				$("#center").hide();
			} else {
				//$("#sessionid").load("operation_new-session.php");
				$("#sessionid").html("Your session ID is " + sessionvariable1 + ".");
				//alert(sessionvariable1);
				$("#warning").hide();
				$("#center").show();
			}
			$('#input_sessionid').attr('value', sessionvariable1);
			$("#list").load("operation_list-ages.php");
			//$("#food").load("operation_list-food.php");
			$.post("operation_read-inputs.php", {
				session: sessionvariable1
			}).done(function(data) {
				age = $("#ages :selected").text();
				gender = $("input[name='gender-option']:checked").val();
				$("#agerange").html(age);
				$('#gender').html(gender);
				$("#table").html(data);
			});
			$('input[type=radio][name=theme]').change(function() {
				if (this.value == 'light') {
					$('link[href="config_design_dark.css"]').attr('href', 'config_design_light.css');
				} else if (this.value == 'dark') {
					$('link[href="config_design_light.css"]').attr('href', 'config_design_dark.css');
				}
			});

			$('input[type=radio][name=gender-option]').change(function() {
				newevent();
			});

			if ($('#healthrisks').is(':empty')) {
				$('#healthrisks_header').hide();
				$('#recommendations').hide();
			} else {
				$('#healthrisks_header').show();
				$('#recommendations').show();
			}
		}
	</script>
</head>

<body>
	<div class="container-fluid">
		<div id="top" class="container-fluid">
			<div class="container-fluid" style="padding:15px;background-color: #e1f3f0; color: white; text-align: center;">
				<div class="col-12">
					<div class="container-fluid" style="text-align:center; float:left; overflow-x: hidden; background-color: #e1f3f0;">
						<div style="text-align: center;">
							<img src="assets/logoNutrientsTracker.png" style="height: 15vw;" />
						</div>
					</div>
				</div>
				<div class="container-fluid" style="display: flex; justify-content: space-between; width: 70%;">
					<a href="index.php">Tracker</a>
					<a href="rdi.php">RDI</a>
					<a href="foodlist.php">Food List</a>
					<a href="foodrecommendation.php">Meal Recommendation</a>
					<a href="help.php">Help</a>
					<?php
					if ($islogin == true) {
					?>
						<a id="logout" href="">Logout</a>
					<?php
					} else { ?>
						<a href="login.php">Login</a>
					<?php
					}
					?>
				</div>
				<!-- development purposes 												-->
				<nav style="display: none;">
					<h4 id="sessionid" style="color:#151515;">No session ID found.</h4>
					<h4 id="agerange" style="color:#151515;">Error reading age range.</h4>
					<h4 id="gender" style="color:#151515;">Error reading gender.</h4>
				</nav>
				<!-- development purposes 													-->
				<div id="warning" align="center" style="display: none">
					<h4 style="color: red">Notice!</h4><br>
					<p>This system's data is based on data taken from the FDA, which is focused on <span style="color: red">people with normal/healthy BMI</span>. This system should NOT be used for people with <span style="color: red">health conditions, unhealthy weight, or pregnancies</span>. For more information, please check the <a href="help.html">Help</a> page.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="row" style="padding:0px;">
					<div class="col-6">
						<div class="container-fluid" style="padding:15px;width:100%; min-height:71.5vh; float:right; height:auto; border: 1px solid #efffe1; background-color: #0DAD8D;">
							<div class="row">
								<div class="col-12">
									<div class="row">
										<div class="col-6">
											<form id="genders">
												<p>Select gender:</p>
												<?php
												if ($gender != null && $gender == "Male") {
												?>
													<input type="checkbox" id="gender-option_male" name="gender-option" value="Male" checked>
													<label for="gender-option_male">Male</label></br>
												<?php
												} else {
												?>
													<input type="checkbox" id="gender-option_male" name="gender-option" value="Male">
													<label for="gender-option_male">Male</label></br>
												<?php
												}
												?>
												<?php
												if ($gender != null && $gender == "Female") {
												?>
													<input type="checkbox" id="gender-option_female" name="gender-option" value="Female" checked>
													<label for="gender-option_female">Female</label>
												<?php
												} else {
												?>
													<input type="checkbox" id="gender-option_female" name="gender-option" value="Female">
													<label for="gender-option_female">Female</label>
												<?php
												}
												?>

											</form>
											<label for="age">Age <small><i>(years)</i></small> :</label></br>
											<input type="text" class="form-control" id="age" value="<?php echo $age; ?>" checked></br>
										</div>
										<div class="col-6">
											<label for="height">Height <small><i>(inches)</i></small> :</label></br>
											<input type="text" class="form-control" id="height" checked></br>
											<label for="weight">Weight <small><i>(kilogram)</i></small> :</label></br>
											<input type="text" class="form-control" id="weight" checked></br>
										</div>
										<div class="col-12">
											<form id="activity">
												<p>Activity Level:</p>
												<input type="checkbox" id="sedentary-option" name="level-option" value="sedentary">
												<label for="sedentary-option">Sedentary (little or no exercise)</label></br>
												<input type="checkbox" id="lightly-option" name="level-option" value="lightly">
												<label for="lightly-option">Lightly active (light exercise/sports 1-3 days/week)</label></br>
												<input type="checkbox" id="moderately-option" name="level-option" value="moderately">
												<label for="moderately-option">Moderately active (moderate exercise/sports 3-5 days/week)</label></br>
												<input type="checkbox" id="very-option" name="level-option" value="very">
												<label for="very-option">Very active (hard exercise/sports 6-7 days/week)</label></br>
												<input type="checkbox" id="extra-option" name="level-option" value="extra">
												<label for="extra-option">Extra active (very hard exercise/sports & physical job or 2x training)</label></br><br><br>
											</form>
										</div>
										<div class="col-12">
											<input class="form-control" id='calculate_meal' type='button' style='width: 100%;float:right;' value='Calculate'>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-6">
						<div class="container-fluid food-ex" style="padding:15px;width:100%; float:right; height:auto; border: 1px solid #efffe1; background-color: #0DAD8D; display:none;">
							<div class="row">
								<div class="col-12">
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Calories</th>
												<th scope="col">Carbohydrates</th>
												<th scope="col">Protein</th>
												<th scope="col">Fat</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="calories"></td>
												<td class="carb"></td>
												<td class="protein"></td>
												<td class="fat"></td>
											</tr>
										</tbody>
									</table>
									<h6>Food Exchange</h6>
									<table class="table">
										<thead>
											<tr>
												<th scope="col">Food</th>
												<th scope="col"> # of Exchange</th>
												<th scope="col">Carbohydrates (g)</th>
												<th scope="col">Protein (g)</th>
												<th scope="col">Fat (g)</th>
												<th scope="col">Energy (kcal)</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Veg</td>
												<td class="vegEx"></td>
												<td class="vegTotalCHO"></td>
												<td class="vegTotalCHONg"></td>
												<td class="vegTotalfat"></td>
												<td class="totalVegCalorie"></td>
											</tr>
											<tr>
												<td>Fruit</td>
												<td class="fruitEx"></td>
												<td class="fruitTotalCHO"></td>
												<td class="fruitTotalCHONg"></td>
												<td class="fruitTotalfat"></td>
												<td class="totalFruitCalorie"></td>
											</tr>
											<tr>
												<td>Milk</td>
												<td class="milkEx"></td>
												<td class="milkTotalCHO"></td>
												<td class="milkTotalCHONg"></td>
												<td class="milkTotalfat"></td>
												<td class="totalMilkCalorie"></td>
											</tr>
											<tr>
												<td>Rice</td>
												<td class="riceEx"></td>
												<td class="riceTotalCHO"></td>
												<td class="riceTotalCHONg"></td>
												<td class="riceTotalfat"></td>
												<td class="totalRiceCalorie"></td>
											</tr>
											<tr>
												<td>Meat</td>
												<td class="meatEx"></td>
												<td class="meatTotalCHO"></td>
												<td class="meatTotalCHONg"></td>
												<td class="meatTotalfat"></td>
												<td class="totalMeatCalorie"></td>
											</tr>
											<tr>
												<td>Fat</td>
												<td class="fatEx"></td>
												<td class="fatTotalCHO"></td>
												<td class="fatTotalCHONg"></td>
												<td class="fatTotalfat"></td>
												<td class="totalFatCalorie"></td>
											</tr>
											<tr>
												<td>Sugar</td>
												<td class="sugarEx"></td>
												<td class="sugarTotalCHO"></td>
												<td class="sugarTotalCHONg"></td>
												<td class="sugarTotalfat"></td>
												<td class="totalSugarCalorie"></td>
											</tr>
											<tr>
												<td><b>Total</b></td>
												<td class=""></td>
												<td class="totalCHO"></td>
												<td class="totalCHONg"></td>
												<td class="totalfat"></td>
												<td class="totalCalorie"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

						</div>
					</div>
					<div class="col-12">
						<div class="container-fluid food-recom" style="padding:15px;width:100%; min-height:40vh; float:right; height:auto; border: 1px solid #efffe1; background-color: #0DAD8D; display:none;">
							<div class="row">
								<div class="col-12 text-center">
									<h2>Meal Recommendation</h2>
									<table class="table" style="text-align:left;">
										<thead>
											<tr>
												<th scope="col">Breakfast</th>
												<th scope="col">Lunch</th>
												<th scope="col">Snack</th>
												<th scope="col">Dinner</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="breakfast"></td>
												<td class="lunch"></td>
												<td class="snack"></td>
												<td class="dinner"></td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
<script>
	$(document).on('click', '#logout', function() {

		$.ajax({
			type: 'post',
			url: "ajax/ajax_function.php?logout",
			data: {},
			success: function(response) {
				window.location.href = "login.php";
			}
		});
	})

	$("input:checkbox").on('click', function() {
		// in the handler, 'this' refers to the box clicked on
		var $box = $(this);
		if ($box.is(":checked")) {
			// the name of the box is retrieved using the .attr() method
			// as it is assumed and expected to be immutable
			var group = "input:checkbox[name='" + $box.attr("name") + "']";
			// the checked state of the group/box on the other hand will change
			// and the current value is retrieved using .prop() method
			$(group).prop("checked", false);
			$box.prop("checked", true);
		} else {
			$box.prop("checked", false);
		}
	});

	$(document).on('click', '#calculate_meal', function() {
		var height = $('#height').val();
		var weight = $('#weight').val();
		var age = $('#age').val();
		var level = $("input[name='level-option']:checked").val();
		var gender = $("input[name='gender-option']:checked").val();
		console.log(level);
		console.log(gender);
		$.ajax({
			type: 'post',
			url: "ajax/ajax_function.php?calculate_meal",
			data: {
				height: height,
				weight: weight,
				level: level,
				gender: gender,
				age: age
			},
			success: function(response) {
				var res = JSON.parse(response);
				$('.calories').html(res.calories + ' g');
				$('.carb').html(res.carb + ' g');
				$('.protein').html(res.protein + ' g');
				$('.fat').html(res.fat + ' g');

				$('.vegEx').html(res.vegEx);
				$('.vegTotalCHO').html(res.vegTotalCHO);
				$('.vegTotalCHONg').html(res.vegTotalCHONg);
				$('.vegTotalfat').html(res.vegTotalfat);

				$('.sugarEx').html(res.sugarEx);
				$('.sugarTotalCHO').html(res.sugarTotalCHO);
				$('.sugarTotalCHONg').html(res.sugarTotalCHONg);
				$('.sugarTotalfat').html(res.sugarTotalfat);

				$('.riceEx').html(res.riceEx);
				$('.riceTotalCHO').html(res.riceTotalCHO);
				$('.riceTotalCHONg').html(res.riceTotalCHONg);
				$('.riceTotalfat').html(res.riceTotalfat);

				$('.milkEx').html(res.milkEx);
				$('.milkTotalCHO').html(res.milkTotalCHO);
				$('.milkTotalCHONg').html(res.milkTotalCHONg);
				$('.milkTotalfat').html(res.milkTotalfat);

				$('.fruitEx').html(res.fruitEx);
				$('.fruitTotalCHO').html(res.fruitTotalCHO);
				$('.fruitTotalCHONg').html(res.fruitTotalCHONg);
				$('.fruitTotalfat').html(res.fruitTotalfat);

				$('.meatEx').html(res.meatEx);
				$('.meatTotalCHO').html(res.meatTotalCHO);
				$('.meatTotalCHONg').html(res.meatTotalCHONg);
				$('.meatTotalfat').html(res.meatTotalfat);

				$('.fatEx').html(res.meatEx);
				$('.fatTotalCHO').html(res.fatTotalCHO);
				$('.fatTotalCHONg').html(res.fatTotalCHONg);
				$('.fatTotalfat').html(res.fatTotalfat);

				$('.totalVegCalorie').html(res.totalVegCalorie);
				$('.totalSugarCalorie').html(res.totalSugarCalorie);
				$('.totalRiceCalorie').html(res.totalRiceCalorie);
				$('.totalMilkCalorie').html(res.totalMilkCalorie);
				$('.totalFruitCalorie').html(res.totalFruitCalorie);
				$('.totalMeatCalorie').html(res.totalMeatCalorie);
				$('.totalFatCalorie').html(res.totalFatCalorie);
				$('.totalCalorie').html('<b>' + res.totalCalorie + '</b>');

				$('.totalCHO').html('<b>' + res.totalCHO + '</b>');
				$('.totalCHONg').html('<b>' + res.totalCHONg + '</b>');
				$('.totalfat').html('<b>' + res.totalfat + '</b>');

				$('.breakfast').html('<small><b>' + ((res.breakfast).toString()).split(',').join('') + '</b></small>');
				$('.lunch').html('<small><b>' + ((res.lunch).toString()).split(',').join('') + '</b></small>');
				$('.snack').html('<small><b>' + ((res.snack).toString()).split(',').join('') + '</b></small>');
				$('.dinner').html('<small><b>' + ((res.dinner).toString()).split(',').join('') + '</b></small>');

				$('.food-recom').css('display', '');
				$('.food-ex').css('display', '');

			}
		});
	})
</script>