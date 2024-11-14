<?php
session_start();
$islogin = false;
if (isset($_SESSION["islogin"])) {
    $islogin = $_SESSION["islogin"];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="stylesheets/style.css" />
    <link rel="icon" href="NutritionTrackerLogo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.0/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap4-toggle.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Nutrition Tracker - Food Lists</title>
    <!-- Custom fonts for this template-->
    <!-- <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.min.css" > -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Styles -->
    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="css/sb-admin-2.min.css">
</head>
<style>
    .bg-warning-400 {
        background-color: #ff7043;
    }

    .swal2-confirm {
        width: 6.4rem !important;
    }

    .swal2-actions>button+button {
        margin-left: 0.625rem;
    }

    .swal2-cancel {
        width: 6.4rem !important;
    }

    body {
        background-color: #fbfff2;
    }

    .aaa {
        color: white;
        text-decoration: none;
        border: 1px solid white;
        padding: 5px;
        min-width: 10vw;
        text-align: center;
        background-color: #0DAD8D;
    }

    .nav1 {
        padding: 15px;
        width: 100%;
        height: 100%;
    }

    @media screen and (min-width: 1000px)
    /* Landscape */
        {
        body {
            font-size: 15px;
        }

        #left {
            width: 15%;
        }

        #center {
            width: 85%;
        }
    }

    @media screen and (max-width: 999px)
    /* Portrait */
        {
        body {
            font-size: 30px;
        }

        #left {
            width: 20%;
            font-size: 20px;
        }

        #center {
            width: 80%;
        }
    }
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <div class="container-fluid nav1" style="padding-top: 0px;">
                    <div id="top" class="container-fluid nav1" style="padding-top: 0px;">
                        <div class="container-fluid nav" style="padding-top: 0px;background-color: #e1f3f0; color: white; text-align: center;">
                            <div class="col-12">
                                <div class="container-fluid" style="text-align:center; float:left; overflow-x: hidden; background-color: #e1f3f0;">
                                    <div style="text-align: center;">
                                        <img src="assets/logoNutrientsTracker.png" style="height: 15vw;" />
                                    </div>
                                </div>
                            </div>
                            <div class="container-fluid nav1" style="display: flex; justify-content: space-between; width: 70%;">
                                <a class="aaa" href="index.php">Tracker</a>
                                <a class="aaa" href="rdi.php">RDI</a>
                                <a class="aaa" href="foodlist.php">Food List</a>
                                <a class="aaa" href="foodrecommendation.php">Meal Recommendation</a>
                                <a class="aaa" href="help.php">Help</a>
                                <?php
                                if ($islogin == true) {
                                ?>
                                    <a class="aaa" id="logout" href="">Logout</a>
                                <?php
                                } else { ?>
                                    <a class="aaa" href="login.php">Login</a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                </br>
                <div class="container-fluid" style="width: 98%;">
                    <div class="row text-center">
                        <h6 class="m-0 font-weight-bold" style="text-align:center; font-size:150%; font-family:monospace; width:100%;">FOOD LISTS</h6>
                    </div>
                    <?php
                    if ($islogin == true) {

                    ?>
                        <div class="row">
                            <div class="col-12 text-center">
                                <div data-toggle="modal" data-target="#jobModal">
                                    <button class="btn float-right add_job" data-toggle="tooltip" title="ADD FOOD" style="border-radius: 50%; background-color:#0DAD8D;"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div><br />

                        <div class="table-responsive toggle-order-table">
                            <table id="tabledata-foodlists" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th class="text-left">Food Item</th>
                                        <th class="text-left">Energy (kcal)</th>
                                        <th class="text-left">Protein (g)</th>
                                        <th class="text-left">Fat (g)</th>
                                        <th class="text-left">Carbohydrate (g)</th>
                                        <th class="text-left">Calcium (mg)</th>
                                        <th class="text-left">Phosphorus (mg)</th>
                                        <th class="text-left">Iron (mg)</th>
                                        <th class="text-left">Vitamin A (μg)</th>
                                        <th class="text-left">Thiamin (mg)</th>
                                        <th class="text-left">Riboflavin (mg)</th>
                                        <th class="text-left">Niacin (mg)</th>
                                        <th class="text-left">Vitamin C / Ascorbic acid (mg)</th>
                                        <th class="text-center">ACTION</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>

                    <?php
                    } else {
                    ?>

                        <div class="table-responsive toggle-order-table">
                            <table id="tabledata-foodlist" class="table table-striped display">
                                <thead>
                                    <tr>
                                        <th class="text-left">Food Item</th>
                                        <th class="text-left">Energy (kcal)</th>
                                        <th class="text-left">Protein (g)</th>
                                        <th class="text-left">Fat (g)</th>
                                        <th class="text-left">Carbohydrate (g)</th>
                                        <th class="text-left">Calcium (mg)</th>
                                        <th class="text-left">Phosphorus (mg)</th>
                                        <th class="text-left">Iron (mg)</th>
                                        <th class="text-left">Vitamin A (μg)</th>
                                        <th class="text-left">Thiamin (mg)</th>
                                        <th class="text-left">Riboflavin (mg)</th>
                                        <th class="text-left">Niacin (mg)</th>
                                        <th class="text-left">Vitamin C / Ascorbic acid (mg)</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    <?php
                    }
                    ?>
                </div>


                <?php include 'modal/add_food.php'; ?>
                <?php include 'modal/edit_food.php'; ?>

                <script>
                    $('#tabledata-foodlists').DataTable({
                        "ajax": {
                            "url": "ajax/ajax_function.php?view_foodlists",
                            "dataSrc": ""
                        },
                        "deferRender": true,
                        "lengthMenu": [
                            [10, 25, 50, 100, -1],
                            [10, 25, 50, 100, "All"]
                        ],
                        "orderClasses": false,
                        "ordering": true,
                        "order": [
                            [0, "asc"]
                        ],
                        "columns": [{
                                className: "text-left"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            }
                        ]
                    });

                    $('#tabledata-foodlist').DataTable({
                        "ajax": {
                            "url": "ajax/ajax_function.php?view_foodlist",
                            "dataSrc": ""
                        },
                        "deferRender": true,
                        "lengthMenu": [
                            [10, 25, 50, 100, -1],
                            [10, 25, 50, 100, "All"]
                        ],
                        "orderClasses": false,
                        "ordering": true,
                        "order": [
                            [0, "asc"]
                        ],
                        "columns": [{
                                className: "text-left"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            },
                            {
                                className: "text-center"
                            }
                        ]
                    });

                    $(document).on('click', '.add_food_modal', function() {
                        var food_item = $('#food_item').val();
                        var energy = $('#energy').val();
                        var protein = $('#protein').val();
                        var fat = $('#fat').val();
                        var carbohydrates = $('#carbohydrates').val();
                        var calcium = $('#calcium').val();
                        var phosphorus = $('#phosphorus').val();
                        var iron = $('#iron').val();
                        var vitamina = $('#vitamina').val();
                        var thiamin = $('#thiamin').val();
                        var riboflavin = $('#riboflavin').val();
                        var niacin = $('#niacin').val();
                        var vitaminc = $('#vitaminc').val();

                        if (food_item != '' && energy != '' && protein != '' && fat != '' && carbohydrates != '' && calcium != '' && iron != '' && vitamina != '' && thiamin != '' && riboflavin != '' && niacin != '' && vitaminc != '') {

                            $('.food_itemfieldvalidation').css('display', 'none');
                            $('.energyfieldvalidation').css('display', 'none');
                            $('.proteinfieldvalidation').css('display', 'none');
                            $('.fatfieldvalidation').css('display', 'none');
                            $('.carbohydratesfieldvalidation').css('display', 'none');
                            $('.calciumfieldvalidation').css('display', 'none');
                            $('.phosphorusfieldvalidation').css('display', 'none');
                            $('.ironfieldvalidation').css('display', 'none');
                            $('.vitaminafieldvalidation').css('display', 'none');
                            $('.thiaminfieldvalidation').css('display', 'none');
                            $('.ribonflavinfieldvalidation').css('display', 'none');
                            $('.niacinfieldvalidation').css('display', 'none');
                            $('.vitamincfieldvalidation').css('display', 'none');

                            $.ajax({
                                type: 'post',
                                url: "ajax/ajax_function.php?add_foodlists",
                                data: {
                                    food_item: food_item,
                                    energy: energy,
                                    protein: protein,
                                    fat: fat,
                                    carbohydrates: carbohydrates,
                                    calcium: calcium,
                                    phosphorus: phosphorus,
                                    iron: iron,
                                    vitamina: vitamina,
                                    thiamin: thiamin,
                                    riboflavin: riboflavin,
                                    niacin: niacin,
                                    vitaminc: vitaminc
                                },
                                success: function(response) {
                                    console.log(response);
                                    $('#tabledata-foodlists').DataTable().destroy();
                                    $('#tabledata-foodlists').DataTable({
                                        "ajax": {
                                            "url": "ajax/ajax_function.php?view_foodlists",
                                            "dataSrc": ""
                                        },
                                        "deferRender": true,
                                        "lengthMenu": [
                                            [10, 25, 50, 100, -1],
                                            [10, 25, 50, 100, "All"]
                                        ],
                                        "orderClasses": false,
                                        "ordering": true,
                                        "order": [
                                            [0, "asc"]
                                        ],
                                        "columns": [{
                                                className: "text-left"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            }
                                        ]
                                    });

                                    $(".top > .dataTables_filter").css("float", "left");
                                    $(".bottom > .dataTables_filter").css("display", "none");

                                    $('.dataTables_length').each(function() {
                                        if (!$(this).text().match(/^\s*$/)) {
                                            $(this).insertBefore($(this).prev('.dataTables_filter'));
                                        }
                                    });
                                }
                            });
                        } else {
                            if (venue == '') {
                                $('.venuefieldvalidation').css('display', '');
                            } else {
                                $('.venuefieldvalidation').css('display', 'none');
                            }

                            if (titleofseminar == '') {
                                $('.titleofseminarfieldvalidation').css('display', '');
                            } else {
                                $('.titleofseminarfieldvalidation').css('display', 'none');
                            }

                            if (conductedby == '') {
                                $('.conductedbyfieldvalidation').css('display', '');
                            } else {
                                $('.conductedbyfieldvalidation').css('display', 'none');
                            }

                            if (noofdays == '') {
                                $('.noofdaysfieldvalidation').css('display', '');
                            } else {
                                $('.noofdaysfieldvalidation').css('display', 'none');
                            }

                            if (inclusivedatefrom == '') {
                                $('.inclusivedatefromfieldvalidation').css('display', '');
                            } else {
                                $('.inclusivedatefromfieldvalidation').css('display', 'none');
                            }

                            if (inclusivedateto == '') {
                                $('.inclusivedatetofieldvalidation').css('display', '');
                            } else {
                                $('.inclusivedatetofieldvalidation').css('display', 'none');
                            }
                        }
                    })

                    $(document).on('click', '.editFood', function() {
                        var id = $(this).data('id');
                        var energy = $(this).data('energy');
                        var protein = $(this).data('protein');
                        var fat = $(this).data('fat');
                        var carbohydrates = $(this).data('carbohydrates');
                        var calcium = $(this).data('calcium');
                        var phosphorus = $(this).data('phosphorus');
                        var iron = $(this).data('iron');
                        var vitamina = $(this).data('vitamina');
                        var thiamin = $(this).data('thiamin');
                        var riboflavin = $(this).data('riboflavin');
                        var niacin = $(this).data('niacin');
                        var vitaminc = $(this).data('vitaminc');
                        var food_item = $(this).data('food_item');


                        $('.modal-body #editFoodModalId').val(id);
                        $('.modal-body #editModalenergy').val(energy);
                        $('.modal-body #editModalprotein').val(protein);
                        $('.modal-body #editModalfat').val(fat);
                        $('.modal-body #editModalcarbohydrates').val(carbohydrates);
                        $('.modal-body #editModalcalcium').val(calcium);
                        $('.modal-body #editModalphosphorus').val(phosphorus);
                        $('.modal-body #editModaliron').val(iron);
                        $('.modal-body #editModalvitamina').val(vitamina);
                        $('.modal-body #editModalthiamin').val(thiamin);
                        $('.modal-body #editModalriboflavin').val(riboflavin);
                        $('.modal-body #editModalniacin').val(niacin);
                        $('.modal-body #editModalvitaminc').val(vitaminc);
                        $('.modal-body #editModalfood_item').val(food_item);

                    })

                    $(document).on('click', '.update_food_modal', function() {
                        var id = $('#editFoodModalId').val();
                        var food_item = $('#editModalfood_item').val();
                        var energy = $('#editModalenergy').val();
                        var protein = $('#editModalprotein').val();
                        var fat = $('#editModalfat').val();
                        var carbohydrates = $('#editModalcarbohydrates').val();
                        var calcium = $('#editModalcalcium').val();
                        var phosphorus = $('#editModalphosphorus').val();
                        var iron = $('#editModaliron').val();
                        var vitamina = $('#editModalvitamina').val();
                        var thiamin = $('#editModalthiamin').val();
                        var riboflavin = $('#editModalriboflavin').val();
                        var niacin = $('#editModalniacin').val();
                        var vitaminc = $('#editModalvitaminc').val();

                        if (food_item != '' && energy != '' && protein != '' && fat != '' && carbohydrates != '' && calcium != '' && iron != '' && vitamina != '' && thiamin != '' && riboflavin != '' && niacin != '' && vitaminc != '') {

                            $('.food_itemfieldvalidation').css('display', 'none');
                            $('.energyfieldvalidation').css('display', 'none');
                            $('.proteinfieldvalidation').css('display', 'none');
                            $('.fatfieldvalidation').css('display', 'none');
                            $('.carbohydratesfieldvalidation').css('display', 'none');
                            $('.calciumfieldvalidation').css('display', 'none');
                            $('.ironfieldvalidation').css('display', 'none');
                            $('.vitaminafieldvalidation').css('display', 'none');
                            $('.thiaminfieldvalidation').css('display', 'none');
                            $('.ribonflavinfieldvalidation').css('display', 'none');
                            $('.niacinfieldvalidation').css('display', 'none');
                            $('.vitamincfieldvalidation').css('display', 'none');

                            $.ajax({
                                type: 'post',
                                url: "ajax/ajax_function.php?update_foodlists",
                                data: {
                                    id: id,
                                    food_item: food_item,
                                    energy: energy,
                                    protein: protein,
                                    fat: fat,
                                    carbohydrates: carbohydrates,
                                    calcium: calcium,
                                    phosphorus: phosphorus,
                                    iron: iron,
                                    vitamina: vitamina,
                                    thiamin: thiamin,
                                    riboflavin: riboflavin,
                                    niacin: niacin,
                                    vitaminc: vitaminc
                                },
                                success: function(response) {
                                    console.log(response);
                                    $('#tabledata-foodlists').DataTable().destroy();
                                    $('#tabledata-foodlists').DataTable({
                                        "ajax": {
                                            "url": "ajax/ajax_function.php?view_foodlists",
                                            "dataSrc": ""
                                        },
                                        "deferRender": true,
                                        "lengthMenu": [
                                            [10, 25, 50, 100, -1],
                                            [10, 25, 50, 100, "All"]
                                        ],
                                        "orderClasses": false,
                                        "ordering": true,
                                        "order": [
                                            [0, "asc"]
                                        ],
                                        "columns": [{
                                                className: "text-left"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            },
                                            {
                                                className: "text-center"
                                            }
                                        ]
                                    });

                                    $(".top > .dataTables_filter").css("float", "left");
                                    $(".bottom > .dataTables_filter").css("display", "none");

                                    $('.dataTables_length').each(function() {
                                        if (!$(this).text().match(/^\s*$/)) {
                                            $(this).insertBefore($(this).prev('.dataTables_filter'));
                                        }
                                    });
                                }
                            });
                        } else {
                            if (venue == '') {
                                $('.venuefieldvalidation').css('display', '');
                            } else {
                                $('.venuefieldvalidation').css('display', 'none');
                            }

                            if (titleofseminar == '') {
                                $('.titleofseminarfieldvalidation').css('display', '');
                            } else {
                                $('.titleofseminarfieldvalidation').css('display', 'none');
                            }

                            if (conductedby == '') {
                                $('.conductedbyfieldvalidation').css('display', '');
                            } else {
                                $('.conductedbyfieldvalidation').css('display', 'none');
                            }

                            if (noofdays == '') {
                                $('.noofdaysfieldvalidation').css('display', '');
                            } else {
                                $('.noofdaysfieldvalidation').css('display', 'none');
                            }

                            if (inclusivedatefrom == '') {
                                $('.inclusivedatefromfieldvalidation').css('display', '');
                            } else {
                                $('.inclusivedatefromfieldvalidation').css('display', 'none');
                            }

                            if (inclusivedateto == '') {
                                $('.inclusivedatetofieldvalidation').css('display', '');
                            } else {
                                $('.inclusivedatetofieldvalidation').css('display', 'none');
                            }
                        }
                    })

                    $(document).on('click', '.removeFood', function() {
                        var id = $(this).data('id');

                        $.ajax({
                            type: 'post',
                            url: "ajax/ajax_function.php?delete_foodlists",
                            data: {
                                id: id
                            },
                            success: function(response) {
                                console.log(response);
                                $('#tabledata-foodlists').DataTable().destroy();
                                $('#tabledata-foodlists').DataTable({
                                    "ajax": {
                                        "url": "ajax/ajax_function.php?view_foodlists",
                                        "dataSrc": ""
                                    },
                                    "deferRender": true,
                                    "lengthMenu": [
                                        [10, 25, 50, 100, -1],
                                        [10, 25, 50, 100, "All"]
                                    ],
                                    "orderClasses": false,
                                    "ordering": true,
                                    "order": [
                                        [0, "asc"]
                                    ],
                                    "columns": [{
                                            className: "text-left"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        },
                                        {
                                            className: "text-center"
                                        }
                                    ]
                                });

                                $(".top > .dataTables_filter").css("float", "left");
                                $(".bottom > .dataTables_filter").css("display", "none");

                                $('.dataTables_length').each(function() {
                                    if (!$(this).text().match(/^\s*$/)) {
                                        $(this).insertBefore($(this).prev('.dataTables_filter'));
                                    }
                                });
                            }
                        });
                    })

                    $(document).on('click', '#logout', function() {

                        $.ajax({
                            type: 'post',
                            url: "ajax/ajax_function.php?logout",
                            data: {},
                            success: function(response) {
                                window.location.href = "http://localhost/jblp2l/jblp2l/login.php";
                            }
                        });
                    })
                </script>