<?php

	$conn = new mysqli('localhost','root','','intern');
	if(isset($_POST['submit']))
	{
		
	$from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amounttotransfer'];

    $sql = "SELECT * from employee where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from employee where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);
	
	
	// constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['accountbalance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }


    else {
        
                // deducting amount from sender's account
                $newbalance = $sql1['accountbalance'] - $amount;
                $sql = "UPDATE employee set accountbalance=$newbalance where id=$from";
                mysqli_query($conn,$sql);
             

                // adding amount to reciever's account
                $newbalance = $sql2['accountbalance'] + $amount;
                $sql = "UPDATE employee set accountbalance=$newbalance where id=$to";
                mysqli_query($conn,$sql);
                
                $sender = $sql1['firstname']." ".$sql1['lastname'];
                $receiver = $sql2['firstname']." ".$sql2['lastname'];
				
				echo $d=date("Y-m-d");
				
                $sql = "INSERT INTO `transaction`(`sendername`, `recievername`, `amount`, `date`) VALUES ('$sender','$receiver','$amount', '$d')";
                $query=mysqli_query($conn,$sql);
				

                if($query){
                     echo "<script> alert('Transaction Successful');
                                     window.location='transactionhistory.php';
                           </script>";
                    
                }

                $newbalance= 0;
                $amount =0;
        }
    }

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
	<link rel="stylesheet" type="text/css" href="selected.css">

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
    width:41%;
	padding: 2.5px;
	margin:8px;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th{
	background-color: gray;
  color: black;
  font-weight: bold;
  padding: 12px;
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
  border-bottom: 1px solid #ddd;
  padding: 8px;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 12px;
}
:root {
  --radius: 2px;
  --baseFg: dimgray;
  --baseBg: white;
  --accentFg: #006fc2;
  --accentBg: #bae1ff;
}
select {
  font: 400 12px/1.3 sans-serif;
  -webkit-appearance: none;
  appearance: none;
  color: var(--baseFg);
  border: 1px solid var(--baseFg);
  line-height: 1;
  outline: 0;
  padding: 0.65em 2.5em 0.55em 0.75em;
  border-radius: var(--radius);
  background-color: var(--baseBg);
  background-image: linear-gradient(var(--baseFg), var(--baseFg)),
    linear-gradient(-135deg, transparent 50%, var(--accentBg) 50%),
    linear-gradient(-225deg, transparent 50%, var(--accentBg) 50%),
    linear-gradient(var(--accentBg) 42%, var(--accentFg) 42%);
  background-repeat: no-repeat, no-repeat, no-repeat, no-repeat;
  background-size: 1px 100%, 20px 22px, 20px 22px, 20px 100%;
  background-position: right 20px center, right bottom, right bottom, right bottom;   
}

select:hover {
  background-image: linear-gradient(var(--accentFg), var(--accentFg)),
    linear-gradient(-135deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(-225deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(var(--accentFg) 42%, var(--accentBg) 42%);
}

select:active {
  background-image: linear-gradient(var(--accentFg), var(--accentFg)),
    linear-gradient(-135deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(-225deg, transparent 50%, var(--accentFg) 50%),
    linear-gradient(var(--accentFg) 42%, var(--accentBg) 42%);
  color: var(--accentBg);
  border-color: var(--accentFg);
  background-color: var(--accentFg);
}
.button_slide {
  color: #000;
  border: 2px solid rgb(216, 2, 134);
  border-radius: 4px;

  margin: 5px;
  padding: 8px 10px;
  display: inline-block;
  font-family: Verdana, Arial, Helvetica, sans-serif;
  font-size: 14px;
  letter-spacing: 1px;
  cursor: pointer;
  box-shadow: inset 0 0 0 0 #D80286;
  -webkit-transition: ease-out 0.4s;
  -moz-transition: ease-out 0.4s;
  transition: ease-out 0.4s;
}
.slide_right:hover {
  box-shadow: inset 400px 0 0 0 #D80286;
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
	 <form method="post"   ><br>
		 <table >
		 <tr>
			<th>S.NO</th>
			<th>FIRSTNAME</th>
			<th>LASTNAME</th>
			<th>EMAIL-ID</th>
			<th>MOBILE NUMBER</th>
			<th>ACCOUNT BALANCE</th>
		</tr>
			<?php
                
                $sid=$_GET['id'];
                $sql = "SELECT id,firstname,lastname,email,number,accountbalance FROM employee WHERE id=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
		<tr>
            <td ><?php echo $rows['id'] ?></td>
            <td ><?php echo $rows['firstname'] ?></td>
            <td ><?php echo $rows['lastname'] ?></td>
            <td ><?php echo $rows['email'] ?></td>
			<td ><?php echo $rows['number'] ?></td>
			<td ><?php echo $rows['accountbalance'] ?></td>
        </tr>
		</table>
		<br><br>
		<label>Transfer To</label><br>
		<select name="to"  required>
            <option value="" disabled selected>Choose</option>
            <?php
               
                $sid=$_GET['id'];
                $sql = "SELECT id,firstname,lastname,email FROM employee where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['firstname'] ;?> 
                    <?php echo $rows['lastname'] ;?>(EMAIL-ID : 
					<?php echo $rows['email'] ;?>)
                </option>
            <?php 
                } 
            ?>
        </select>
			<br>
			<div>
            <p  style="border-bottom: 2px solid #adadad; position: relative; margin: 8px 0;">
		 
			<label for="amount">Amount To Transfer</label>
			<input type="number" class="form-control" id="amounttotransfer" name="amounttotransfer"/></p>
			</div>
			<br>
			<div id="outer">
				<button class="button_slide slide_right" name="submit" type="submit"><strong>TRANSFER MONEY</strong></button>
			</div>
			 <!--<button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer</button> -->
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
