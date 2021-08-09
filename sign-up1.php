<?php


include 'connection.php';

error_reporting(0);

session_start();

// if (isset($_SESSION['email'])) {
//     header("Location: sign-in1.php");
// }

if (isset($_POST['submit'])) {
	$username = $_POST['uname'];
	$email = $_POST['email'];
	$password = md5($_POST['psw']);
	$cpassword = md5($_POST['cpsw']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM registration WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO registration ( email,name, password)
					VALUES ('$email','$username',  '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Great! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['psw'] = "";
				$_POST['cpsw'] = "";
        header("Location: sign-in1.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('0ops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href='https://fonts.googleapis.com/css?family=Carter One' rel='stylesheet'>
  <link rel="stylesheet" href="web1.css">
  <script src="home.js"></script>
  <style>
    .btn {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .btn:hover {
      opacity: 0.8;
    }

    .btn1 {
      background-color: transparent;
      color: black;
      padding: 6px 6px;
      margin: 8px 0;
      border: 1px solid black;
      cursor: pointer;
      width: 10%;

    }

    .btn1:hover {
      opacity: 0.8;
    }

    .login-form {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
      padding-top: 60px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
    }


    .login {
      background-color: #ffffffe0;
      margin: 1% auto;
      border: 1px solid #888;
      width: 45%;
      border-radius: 15px;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
        0 10px 10px rgba(0, 0, 0, 0.22);
      padding: 10px;
    }

    .social-container {
      margin: 20px 0;
      text-align: center;
    }

    .social-container a {
      border: 1px solid #DDDDDD;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
      text-align: center;
    }

    input[type=text],
    input[type=password],
    input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      background-color: #eee;
    }

    .end {
      text-align: center;
      background-color: rgb(233, 222, 208);
    }

    .signup-img {
      background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK0fcW9WNP8cKDvmHHzEtTYlRO-SmV981weA&usqp=CAU);


    }

    @media screen and (max-width: 600px) {

      input[type=submit],
      input[type=text],
      input[type=search] {
        width: 100%;
        margin-top: 0;

      }

      button {
        text-align: right;

        display: block;
        border: 50px;
      }

      .login {
        margin: 1% auto;

      }

      .social-container {
        font-size: 10px;
      }

      h1 {
        font-size: 30px;
      }

      label {
        font-size: 15px;
      }
    }
    a {
        color:black;
    }
    a:hover {
        text-decoration: none;
    color: white;
}
.social-container a {
        color:rgb(141, 39, 167);;
    }
    .social-container  a:hover {
        text-decoration: none;
    color:rgb(209, 80, 241); ;
}
  </style>
</head>

<body>
  <div class="signup-img">
    <nav data-spy="affix" data-offset-top="197">
      <div class="menu-icon">
        <span class="fa fa-bars"></span>
      </div>
      <div class="logo">
        <img src="logo2.png">
      </div>
      <div class="nav-items">
        <li><a href="web1.php"><span class="fa fa-home"></span> Home</a></li>
        <li><a href="web1.php"><span class="fa fa-user"></span> About</a></li>
        


      </div>
      <div class="search-icon">
        <span class="fa fa-search"></span>
      </div>
      <div class="cancel-icon">
        <span class="fa fa-times"></span>
      </div>
      <form action="#">
        <input type="search" class="search-data" placeholder="Search" required>
        <button type="submit" class="fa fa-search"></button>
      </form>
    </nav>


    <div class="login-form"></div>
    <form action="" method="POST" class="login">

      <div class="social-container">
        <h1>Welcome!</h1>
        <a href="https://www.facebook.com/" class="social"><i class="fa fa-facebook"></i></a>
        <a href="https://www.google.com/" class="social"><i class="fa fa-google"></i></a>
        <a href="https://www.linkedin.com/" class="social"><i class="fa fa-linkedin"></i></a>
      </div>
      <div class="details-container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Enter email" name="email"  value ="<?php echo $email?>" required>

        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" value ="<?php echo $name?>" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw"  value ="<?php echo  $_POST['$password']?>" required>

        <label for="psw"><b>Confirm Password</b></label>
        <input type="password" placeholder="Enter Password" name="cpsw" value ="<?php echo  $_POST['$cpassword']?>" required>

        <button class="btn" type="submit" name="submit">Login</button>
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
      </div>
      <div class="end">
        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>


        <button class="btn1" type="button" onclick="document.getElementById('id01').style.display='none'"
          class="cancelbtn"><a href="sign-in1.php">SignIn</a></button>
        <span>already a customer?</span>
      </div>
    </form>
 

  <footer>


    <div class="footer-bottom">
      Copyright &copy; stylekart 2021.
    </div>

  </footer>
</div>
  <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = () => {
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = () => {
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = () => {
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>






</body>

</html>