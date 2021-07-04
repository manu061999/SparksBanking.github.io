<?php
	$conn = new mysqli('localhost','root','','intern');
	
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    
    <title>View Customers</title>
<!--

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/templatemo-art-factory.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">
	<link rel="stylesheet" type="text/css" href="styl.css">

	<style type="text/css">

label:after {
  content: ": ";
}

label {
  color: black;
  font-weight: bold;
  padding: 4px;
  text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
}
p{
    display:inline-block;
    width:50%;
	padding: 15px;
	margin:10px;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th{
	background-color: gray;
  color: black;
  font-weight: bold;
  padding: 18px;
  text-transform: uppercase;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
  border-bottom: 1px solid #ddd;
  text-align: center;
  
}

td:hover {background-color:#f5f5f5;}

td {
  background-color: white;
    color: black;
	text-align: center;
  border-bottom: 1px solid #ddd;
  padding: 8px;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  
  color: white;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}


.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>

    </head>
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
	 <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">Banking System</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.html">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Add Customer</a></li>
                            <li class="scroll-to-section"><a href="ViewCust.php">View Customers </a></li>
                            <li class="scroll-to-section"><a href="TransferMoney.php">Transfer Money</a></li>
                            <li class="scroll-to-section"><a href="transactionhistory.php">Transaction History</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->
	
	<div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                        <h1><br>Online Banking <br><strong>for YOU</strong></h1>
                        <p>Transfer the money to the person you intend to send by fraction of seconds.</p>
                        
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                        <img src="assets/images/bank.png" class="rounded img-fluid d-block mx-auto" alt="First Vector Graphic">
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
	
	
    <section class="section" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/mmm.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section> 

	 <div class="login-form">
		 <table >
		 <tr>
			<th>S.NO</th>
			<th>SENDER NAME</th>
			<th>RECIEVER NAME</th>
			<th>AMOUNT</th>
			<th>DATE</th>
		</tr>
		<?php
			$sql="SELECT tid,sendername,recievername,amount,date FROM transaction;";
			$result=mysqli_query($conn, $sql);
			while($row = mysqli_fetch_assoc($result)){
		?>
		<tr>
            <td ><?php echo $row['tid'] ?></td>
            <td ><?php echo $row['sendername'] ?></td>
            <td ><?php echo $row['recievername'] ?></td>
            <td ><?php echo $row['amount'] ?></td>
			<td ><?php echo $row['date'] ?></td>
		</tr>
		<?php
			}
		?>

	</div>
   
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
 
	</div> 

<!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
  </body>
</html>
