<?php 
   session_start();

   include("config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+Bhai+2&family=Roboto:wght@300&display=swap');
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="chatbot.html">ChatBot</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-box">
        <div class="top">
            <?php
                $id = $_SESSION['id'];
                $query = mysqli_query($con,"SELECT * FROM users WHERE id=$id");

                if($result = mysqli_fetch_assoc($query)){
                    $res_Uname = $result['name'];
                    $res_Email = $result['email'];
                    $res_Age = $result['Age'];
                    $res_AccountNumber = $result['accountnumber']; // Fetching account number
                } else {
                    // Handle case where user details are not found
                    $res_Uname = "User";
                    $res_Email = "N/A";
                    $res_Age = "N/A";
                    $res_AccountNumber = "N/A";
                }
            ?>
            <div class="box">
                <p>Hello <b><?php echo $res_Uname ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $res_Email ?></b>.</p>
            </div>
            <div class="box">
                <p>Your account number is <b><?php echo $res_AccountNumber ?></b>.</p> <!-- Displaying account number -->
            </div>
            <div class="box">
                <p>You are <b><?php echo $res_Age ?> years old</b>.</p>
            </div>
        </div>
    </main>
    
    <section class="topContent">
      <div class="mainHeading">
          <div><span class="main-content" style="color: #4eb14e;">Basic Banking System</span></div>
          <div style="margin-top: 12px;"><span class="sub-content">A Basic Banking System for making money transactions between users. 
            <br>No login system. 
            <br>No user creation. 
            <br>Direct transfer between existing users.</span></div>
          <a href="#services" class="btn btn-outline-success mt-3">Get Started</a>
      </div>
	
    </section>

    <section class="container" id="services">
    	<h2 class="heading">Our Services</h2>

    	<div class="container  text-center">
			<div class="row">
        		<div class="card col-md-3 mx-auto" style="width: 18rem;">
        			<img src="images/customer.png" class="card-img-top mt-3 img" alt="Responsive Image">
          			<div class="card-body">
            			<h5 class="card-title">View Users</h5>
            			<p class="card-text">View all Users</p>
            			<a href="./transfermoney.php" class="btn btn-success">Go</a>
        			</div>
        		</div>

				<div class="card col-md-3 mx-auto" style="width: 18rem;">
					<img src="images/transfer.png" class="card-img-top mt-3 img" alt="Responsive Image">
					<div class="card-body">
						<h5 class="card-title">Loan Calculator</h5>
						<p class="card-text">Calculate your Loan Amount</p>
						<a href="loancalculator.html" class="btn btn-success">GO</a>
					</div>
				</div>

        <div class="card col-md-3 mx-auto" style="width: 18rem;">
          <img src="images/transfer.png" class="card-img-top mt-3 img" alt="Responsive Image">
          <div class="card-body">
            <h5 class="card-title" id="harry">Transfer Money</h5>
            <p class="card-text"> Transfer Money between multiple accounts</p>
            <a href="./transfermoney.php" class="btn btn-success">Go</a>
          </div>
        </div>

        <div class="card col-md-3 mx-auto" style="width: 18rem;">
          <img src="images/transactions.png" class="card-img-top mt-3 img" alt="Responsive Image">
          <div class="card-body">
            <h5 class="card-title">View Transactions</h5>
            <p class="card-text">View all the past transactions happened between different accounts</p>
            <a href="./transactionhistory.php" class="btn btn-success">GO</a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
    

    <!-- Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</body>
</html>
