<?php
	session_start();
    $islogin = false;
	$age = null;
	$gender = null;

    if( isset($_SESSION["islogin"]) ){
        $islogin = $_SESSION["islogin"];
    }

    if( isset($_SESSION["islogin"]) ){
        $islogin = $_SESSION["islogin"];
    }

	if( isset($_SESSION["age"]) ){
        $age = $_SESSION["age"];
    }

	if( isset($_SESSION["gender"]) ){
        $gender = $_SESSION["gender"];
    }

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Nutrition Tracker</title>
        <link rel="icon" href="NutritionTrackerLogo.png" type="image/png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="jquery.min.js"></script>
		<script src="jquery.session.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" type="text/css" href="config_design.css">
		<script src="functions.js"></script>
		<script src="compare1.js"></script>
		<script>
		function searchfunction()
		{
			searchbox();
		}
		function searchfunction2()
		{
			searchbox2();
		}
		function searchfunction3()
		{
			searchbox3();
		}
		function recommend()
		{
			$("#rcheader").html("Food recommendations:");
			recommendation1();
		}
		function newevent()
		{
			age = $("#ages :selected").text();
			gender = $("input[name='gender-option']:checked").val();
			$("#agerange").html(age);
			$('#gender').html(gender);
			$('#healthrisks_header').show();
			$('#recommendations').show();
		};
		function newevent1()
		{
			age = $("#age").val();
			gender = $('input[name="gender-option"]:checked').val();
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
		$(window).on('load', function()
		{
			sessionvariable = sessionStorage.getItem('id');
			sessionvariable1 = $.session.get('id');
			console.log(sessionvariable);
			if(sessionvariable = "false" && sessionvariable == null) 
			{
				$("#sessionid").load("operation_new-session.php");
				$("#warning").show();
				$("#center").hide();
			}
			else
			{
				//$("#sessionid").load("operation_new-session.php");
				$("#sessionid").html("Your session ID is " + sessionvariable1 + ".");
				//alert(sessionvariable1);
				$("#warning").hide();
				$("#center").show();
			}
			console.log(sessionvariable1);
			$('#input_sessionid').attr('value', sessionvariable1);
			$("#list").load("operation_list-ages.php");
			//$("#food").load("operation_list-food.php");
			$.post("operation_read-inputs.php", {session: sessionvariable1}).done(function(data) 
			{
				age = $("#age").val();
				gender = $('input[name="gender-option"]:checked').val();
				$("#agerange").html(age);
				$('#gender').html(gender);
				$("#table").html(data);
			});
			$('input[type=radio][name=theme]').change(function() 
			{
				if (this.value == 'light') 
				{
					$('link[href="config_design_dark.css"]').attr('href','config_design_light.css');
				}
				else if (this.value == 'dark') 
				{
					$('link[href="config_design_light.css"]').attr('href','config_design_dark.css');
				}
			});
			
			$('input[type=radio][name=gender-option]').change(function() 
			{
				newevent();
			});
			
			if ($('#healthrisks').is(':empty'))
			{
				$('#healthrisks_header').hide();
				$('#recommendations').hide();
			}
			else
			{
				$('#healthrisks_header').show();
				$('#recommendations').show();
			}

			
		})
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
							if( $islogin == true ){
						?>
							<a id="logout" href="">Logout</a>
						<?php 
							}else { ?>
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
						<p style="color: black">This system's data is based on data taken from the FDA, which is focused on <span style="color: red">people with normal/healthy BMI</span>. This system should NOT be used for people with <span style="color: red">health conditions, unhealthy weight, or pregnancies</span>. For more information, please check the <a href="help.html">Help</a> page.</p>
					</div>
				</div>
		    </div>
			<div class="row">
				<div class="col-12">
					<div class="row" style="padding:0px;">
						<div class="col-6">
							<div class="container-fluid" style="padding:15px;width:100%; min-height:40vh; float:right; height:auto; border: 1px solid #efffe1; background-color: #0DAD8D;">
								<h6 style="color:White;" >The nutritional balance will be set for people with the following characteristics:</h6>
								<div class="row">
									<div class="col-6">
										<form id="genders">
											<p style="color:white;">Select Sex:</p>
											<?php 
												if( $gender != null && $gender == "Male"){
											?>
													<input type="checkbox" id="gender-option_male" name="gender-option" value="Male" checked>
													<label for="gender-option_male">Male</label></br>
											<?php
												}else {
											?>
													<input type="checkbox" id="gender-option_male" name="gender-option" value="Male">
													<label for="gender-option_male">Male</label></br>
											<?php
												}
											?>
											<?php 
												if( $gender != null && $gender == "Female"){
											?>
													<input type="checkbox" id="gender-option_female" name="gender-option" value="Female" checked>
													<label for="gender-option_female">Female</label>
											<?php
												}else {
											?>
													<input type="checkbox" id="gender-option_female" name="gender-option" value="Female">
													<label for="gender-option_female">Female</label>
											<?php
												}
											?>
										</form>
									</div>	
									<div class="col-6">
										<p style="color:white"><label for="age">Age <small><i>(years)</i></small> :</label></p>
										<input type="text" class="form-control" id="age" value="<?php echo $age; ?>" style="width: 30%;"></br>
									</div>
									<div class="col-12">
										<div class="container-fluid" style="text-align:center; width:100%; float:left; height:40vh;min-height:40vh; overflow-x: hidden; background-color: #0DAD8D;">
											<div style="text-align: left;">
												<h6 style="text-align: center;">Search for a food item by typing in its name.</h6>
												<form action="operation_input.php" method="POST">
													<!-- <nav id="food"></nav><br> -->
													<div class="row">
														<div class="col-md-4">
															<select id="meal_type" class="form-select">
																<option value="Breakfast">Breakfast</option>
																<option value="Lunch">Lunch</option>
																<option value="Dinner">Dinner</option>
																<option value="Snack">Snack</option>
															</select>
														</div>
														<div class="col-md-8">
															<input type="text" style="width:100%" class="searchbox form-control" id="searchbox" onkeyup="searchfunction()" placeholder="Search...">
														</div>
													</div>
														
													<input id="input_sessionid" name="input_sessionid" type="text" style="display:none" value="sessionvariable1">
												</form>
												<nav id="foodlist"></nav><br>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="container-fluid" id="middlegroup">	
								<div class="container-fluid" id="mid_center">
									<div class="container-fluid" id="top" style="text-align:center;">
										<nav id="table"></nav>
										<input class="form-control expandModal" type='button' style='width: 30%;float:right;' value='View More'>
									</div>
									<div class="container-fluid" id="mid_bottom" style="text-align:center">
										<nav id="nav_energy"></nav>
									</div>
								</div>
							</div>
						</div>	
					</div> 
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="deficientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Here are several recommended options to address your nutrient imbalances</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4 energy-deficient" style="display:none">
							<h5>Energy <!--small class="energy-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Grapes</li>
							  <li>Avocado</li>
							  <li>Mango</li>
							</ul>
							</div>
						  <div class="col-md-4 protein-deficient" style="display:none">
							<h5>Protein <!--small class="protein-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Fish</li>
							  <li>Eggs</li>
							  <li>Broccoli</li>
							</ul>
							</div>
						  <div class="col-md-4 fat-deficient" style="display:none">
							<h5>Fat <!--small class="fat-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Butter</li>
							  <li>Dark Chocolate</li>
							  <li>Cheese</li>
							</ul>
							</div>
						  <div class="col-md-4 carbohydrate-deficient" style="display:none">
							<h5>Carbohydrates <!--small class="carbohydrate-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Bread</li>
							  <li>Cereals</li>
							  <li>Potato</li>
							</ul>
							</div>
						  <div class="col-md-4 calcium-deficient" style="display:none">
							<h5>Calcium <!--small class="calcium-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Sesame Seeds</li>
							  <li>Almonds</li>
							  <li>Dairy Products</li>
							</ul>
							</div>
						  <div class="col-md-4 iron-deficient" style="display:none">
							<h5>Iron <!--small class="iron-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Red Meat</li>
							  <li>Raisins</li>
							  <li>Tofu</li>
							</ul>
							</div>
						  <div class="col-md-4 vitamina-deficient" style="display:none">
							<h5>Vitamin A <!--small class="vitamina-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Papaya</li>
							  <li>Kiwi</li>
							  <li>Mangoes</li>
							</ul>
							</div>
						  <div class="col-md-4 thiamin-deficient" style="display:none">
							<h5>Thiamin <!--small class="thiamin-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Watermelon</li>
							  <li>Pineapple</li>
							  <li>Guava</li>
							</ul>
							</div>
						  <div class="col-md-4 riboflavin-deficient" style="display:none">
							<h5>Riboflavin <!--small class="riboflavin-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Blackberries</li>
							  <li>Avocado</li>
							  <li>Mulberries</li>
							</ul>
							</div>
						  <div class="col-md-4 niacin-deficient" style="display:none">
							<h5>Niacin <!--small class="niacin-minus" style="color:red;"></small--></h5>
							<ul>
							  <li>Lychee</li>
							  <li>Mangoes</li>
							  <li>Avocado</li>
							</ul>
							</div>
						  <div class="col-md-4 vitaminc-deficient" style="display:none">
							<h5>Vitamin C / Ascorbic acid</h5>
							<ul>
							  <li>Oranges <!--small class="vitaminc-minus" style="color:red;"></small--></li>
							  <li>Strawberries</li>
							  <li>Papaya</li>
							</ul>
							</div>
						</div>
					  </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
			</div>
			<div id="healthrisks_header" class="container-fluid" style="padding 10px; width: 50%; text-align: center; float: center; border 10px;">
				<small style="margin-bottom:10px"><i><b></b> Please click on <a href="foodrecommendation.php" target="__blank_" style="color: blue;">meal recommendations</a> for your nutrients suggestions.</i></small><br/>
			</div>
			<div id="recommendations" class="container-fluid rcheader" style="padding 10px; width: 80vw; text-align: center; float: center; border 10px;display:none;cursor: pointer;">
				<button class="btn" id="rcheader" style="background-color: #0DAD8D;">View Health Risk</button>
			</div>
			<div id="recommendations" class="container-fluid rcheader_hide" style="padding 10px; width: 80vw; text-align: center; float: center; border 10px;display:none;cursor: pointer;">
				<button class="btn" id="rcheader" style="background-color: #0DAD8D;">Hide Health Risk</button>
			</div>		
			<div class="health_recommendation_result" style="display:none;">
				<div id="healthrisks_header" class="container-fluid" style="padding 10px; width: 50%; text-align: left; float: center; border 10px;">
					<h4 class="text-center">Health Risks:</h4>
					<small style="margin-bottom:10px"><i><b>Important Note:</b> We're not responsible for any health risks due to potential nutrient deficiencies. Please note                      that this sample of health risks is just an example. Always consult a healthcare professional before making significant dietary changes, especially if you                      have health concerns.</i></small><br/><br>
					<table id="healthrisks" style="width: 100%;"></table>
				</div>
			</div>
			<!--div id="recommendations" class="container-fluid" style="padding 10px; width: 80vw; text-align: center; float: center; border 10px;">
				<h4 id="rcheader" onclick="recommend()">Click here to get food recommendations</h4>
				<nav id="food_recommendations"></nav>
			</div-->
	    </div>
	</body>
</html> 
<script>
	$(document).on('click', '#logout', function(){

		$.ajax({    
			type : 'post',
			url : "ajax/ajax_function.php?logout",
			data :  {
			}, 
			success : function(response){
				window.location.href = "login.php";
			}
		});
	})

	$(document).on('click', '.closeModal', function(){
		$('#exampleModal').modal('hide');
	})

	$(document).on('click', '.expandModal', function(){
		$('#exampleModal').modal('show');
	})

	$('#exampleModal').modal('show');

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

	$(document).on('click', '.gender_checkbox', function(){
		var checkboxes = document.getElementsByName('gender-option')
		checkboxes.forEach((item) => {
			if (item !== this) item.checked = false;
			$(this).attr('checked');
		})
	})

	$(document).on('click', '#rcheader', function(){
		
		if( $('.health_recommendation_result').css('display') == "none" ){
			$('.rcheader').css('display','none');
			$('.rcheader_hide').css('display','block');
			$('.health_recommendation_result').css('display','block');
		}else {
			$('.rcheader').css('display','block');
			$('.rcheader_hide').css('display','none');
			$('.health_recommendation_result').css('display','none');
		}
	})

	$(document).ready(function(){
		$(document).on('click', '#comparison_update', function(){
			$('#deficientModal').modal('show');
		})

		
	});
	
</script>