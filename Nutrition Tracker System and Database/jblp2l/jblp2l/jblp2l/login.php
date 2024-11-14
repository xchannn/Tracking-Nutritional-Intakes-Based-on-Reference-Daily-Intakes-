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
  nav>.nav.nav-tabs {

    border: none;
    color: #fff;
    background: #272e38;
    border-radius: 0;

  }

  nav>div a.nav-item.nav-link,
  nav>div a.nav-item.nav-link.active {
    border: none;
    padding: 18px 25px;
    color: #fff;
    background: #272e38;
    border-radius: 0;
  }

  nav>div a.nav-item.nav-link.active:after {
    content: "";
    position: relative;
    bottom: -60px;
    left: -10%;
    border: 15px solid transparent;
    border-top-color: #e74c3c;
  }

  .tab-content {
    background: #fdfdfd;
    line-height: 25px;
    border: 1px solid #ddd;
    border-top: 5px solid #e74c3c;
    border-bottom: 5px solid #e74c3c;
    padding: 30px 25px;
  }

  nav>div a.nav-item.nav-link:hover,
  nav>div a.nav-item.nav-link:focus {
    border: none;
    background: #e74c3c;
    color: #fff;
    border-radius: 0;
    transition: background 0.20s linear;
  }

  nav>div a.nav-item.nav-link.active {
    border: none;
    background: #e74c3c;
    color: #fff;
    border-radius: 0;
    transition: background 0.20s linear;
  }

  /* Add a black background color to the top navigation */
  .topnav {
    background-color: #333;
    overflow: hidden;
    margin-top: 1rem;
    margin-bottom: 1rem;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
  }

  /* Change the color of links on hover */
  .topnav a:hover {
    background-color: #ddd;
    color: black;
  }

  /* Add an active class to light the current page */
  .topnav a.active {
    background: #e74c3c;
    color: white;
  }

  /* Hide the link that should open and close the topnav on small screens */
  .topnav .icon {
    display: none;
  }

  .canteenimg img {
    margin-bottom: 1rem;
  }

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
</style>

<body id="page-top">
  <div class="container" style="margin-top: 6rem;">
    <div class="row">
      <div class="col-xs-12 col-md-5" style="margin: auto;">
        <div class="card">
          <div class="card-body" style="background-color: #e1f3f0;">
            <a href="index.php" style="color: #0DAD8D;text-decoration:none;"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
            <div class="canteenimg text-center">
              <img class="img-responsive" src="assets/logoNutrientsTracker.png" />
            </div>
            <div class="form-group">
              <label for="exampleInputUsername">Username</label>
              <input type="text" class="form-control" id="exampleInputUsername" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword" placeholder="Enter password">
            </div>
            <div class="text-center logvalidation" style="display:none;">
              <span style="color:red;">Username or Password is invalid! Try again<span>
            </div>
            <button class="btn form-control" id="loginbtn" style="margin-bottom: 1rem;background-color: #0DAD8D;color: #fff;">Login</button>
          </div>
        </div>

      </div>
    </div>
  </div>
  <script>
    $(document).on('click', '#loginbtn', function() {
      var username = $('#exampleInputUsername').val();
      var password = $('#exampleInputPassword').val();

      $.ajax({
        type: 'post',
        url: "ajax/ajax_function.php?login",
        data: {
          username: username,
          password: password
        },
        success: function(response) {
          if (response == "success") {
            window.location.href = "foodlist.php";
          } else {
            console.log(response);
          }
        }
      });
    })
  </script>
</body>