<?php

session_start();

if (!isset($_SESSION['email'])) {
    header("Location:sign-in1.php");
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Carter One' rel='stylesheet'>

    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: #f2f2f2;
        }

        nav {
            background: #171c24;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            height: 70px;
            padding: 0 100px;
        }

        nav .logo {
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            letter-spacing: -1px;
        }

        nav .nav-items {
            display: flex;
            flex: 1;
            padding: 0 0 0 40px;
        }

        nav .nav-items li {
            list-style: none;
            padding: 0 15px;
        }

        nav .nav-items li a {
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            text-decoration: none;
        }

        nav .nav-items li a:hover {
            color: greenyellow;
        }

        nav form {
            display: flex;
            height: 40px;
            padding: 2px;
            background: rgb(248, 247, 245);
            min-width: 18% !important;
            border-radius: 2px;
            border: 1px solid rgba(155, 155, 155, 0.2);
        }

        nav form .search-data {
            width: 100%;
            height: 100%;
            padding: 0 10px;
            color: rgb(7, 7, 7);
            font-size: 17px;
            border: none;
            font-weight: 500;
            background: none;
        }

        nav form button {
            padding: 0 15px;
            color: #fff;
            font-size: 17px;
            background: green;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        nav form button:hover {
            background: green;
        }

        nav .menu-icon,
        nav .cancel-icon,
        nav .search-icon {
            width: 40px;
            text-align: center;
            margin: 0 50px;
            font-size: 18px;
            color: rgb(255, 255, 255);
            cursor: pointer;
            display: none;
        }

        nav .menu-icon span,
        nav .cancel-icon,
        nav .search-icon {
            display: none;
        }
        a {
        color:black;
    }
    a:hover {
        text-decoration: none;
    color: white;
}

        @media (max-width: 1245px) {
            nav {
                padding: 0 50px;
            }
        }

        @media (max-width: 1140px) {
            nav {
                padding: 0px;
            }

            nav .logo {
                flex: 2;
                text-align: center;
            }

            nav .nav-items {
                position: fixed;
                z-index: 99;
                top: 70px;
                width: 100%;
                left: -100%;
                height: 100%;
                padding: 10px 50px 0 50px;
                text-align: center;
                background: #050008;
                background: -webkit-linear-gradient(to right, #373638, #090111);
                background: linear-gradient(to right, #bcb9bd, #070707bd);
                display: inline-block;
                transition: left 0.3s ease;

            }

            nav .nav-items.active {
                left: 0px;
            }

            nav .nav-items li {
                line-height: 40px;
                margin: 30px 0;
            }

            nav .nav-items li a {
                font-size: 20px;
            }

            nav form {
                position: absolute;
                top: 80px;
                right: 50px;
                opacity: 0;
                pointer-events: none;
                transition: top 0.3s ease, opacity 0.1s ease;
            }

            nav form.active {
                top: 95px;
                opacity: 1;
                pointer-events: auto;
            }

            nav form:before {
                position: absolute;
                content: "";
                top: -13px;
                right: 0px;
                width: 0;
                height: 0;
                z-index: -1;
                border: 10px solid transparent;
                border-bottom-color: #1e232b;
                margin: -20px 0 0;
            }

            nav form:after {
                position: absolute;
                content: '';
                height: 60px;
                padding: 2px;
                background: #1e232b;
                border-radius: 2px;
                min-width: calc(100% + 20px);
                z-index: -2;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
            }

            nav .menu-icon {
                display: block;
            }

            nav .search-icon,
            nav .menu-icon span {
                display: block;
            }

            nav .menu-icon span.hide,
            nav .search-icon.hide {
                display: none;
            }

            nav .cancel-icon.show {
                display: block;
            }
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            transform: translate(-50%, -50%);
        }

        .content header {
            font-size: 30px;
            font-weight: 700;
        }

        .content .text {
            font-size: 30px;
            font-weight: 700;
        }

        .space {
            margin: 10px 0;
        }

        nav .logo.space {
            color: greenyellow;
            padding: 0 5px 0 0;
        }

        @media (max-width: 980px) {

            nav .menu-icon,
            nav .cancel-icon,
            nav .search-icon {
                margin: 0 20px;
            }

            nav form {
                right: 30px;
            }
        }

        @media (max-width: 350px) {

            nav .menu-icon,
            nav .cancel-icon,
            nav .search-icon {
                margin: 0 10px;
                font-size: 16px;
            }
        }

        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .content header {
            font-size: 30px;
            font-weight: 700;
        }

        .content .text {
            font-size: 30px;
            font-weight: 700;
        }

        .content .space {
            margin: 10px 0;
        }

        .footer-bottom {
            padding: 10px;
            background: #00121b;
            color: #fff;
            font-size: 12px;
            text-align: center;
        }



        @media screen and (max-width: 1275px) {
            .footer-items {
                width: 50%;
            }
        }


        @media screen and (max-width: 660px) {
            .footer-items {
                width: 100%;
            }
        }

        .cart {
            background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK0fcW9WNP8cKDvmHHzEtTYlRO-SmV981weA&usqp=CAU);
        }

        .cart-content {
            width: 80%;
            text-align: center;
            margin: 5% auto 5% auto;
            border: 1px solid #888;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
            font-family:cursive;
            font-weight: 400;
        }
        .cart-content button{
            background-color:rgb(245, 170, 49);
            width:90px;
            font-size:25px;
            font-family:'Times New Roman', Times, serif;
        }
        .cart-content  h1{
          font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
          text-align: left;
          font-weight: 900;
      }

        
.ex:hover{
    color:blue;
}
h2{
    text-align:center;
}
.profile-pic{
    position: absolute;
    height:120px;
    width:120px;
    left: 10%;
    transform: translateX(-50%);
    top: 15%;
    z-index: 1001;
    padding: 10px;
}
.profile-pic img{
   
    border-radius: 50%;
    box-shadow: 0px 0px 5px 0px #c1c1c1;
    cursor: pointer;
    width: 100px;
    height: 100px;
}   
.profile-badge{
    
 
    position: relative;
}



    </style>
</head>

<body>
    <div class="cart">
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

        <div class="cart-content " id="#container">
               <h1>Welcome!</h1>
           
            
                <div class="profile-pic profile-badge ">
                  <h2><img class="img-pic" alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" height="200"><span><?php echo $_SESSION['email']?></span></h2>
                   <input id="profile-image-upload" class="hidden" type="file" onchange="previewFile()" >
                </div>
                   <br>
                   <br>
                   <br>
                 <h3>Your Orders</h3>
            <h5>Hi! You have no recent orders </h5>
           <a href="web1.php" class="ex">Explore+</a>
            <br>
           
        
            <button type="submit"><a href="logout.php">LogOut</a></button> 
        
        
        </div>

   

        <footer>
            <div class="footer-bottom">
                Copyright &copy; fashionCart 2021.
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
    <script>
  function previewFile() {
            var preview = document.querySelector('.img-pic');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader();

            reader.addEventListener("load", function () {
                preview.src = reader.result;
            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }
        $(function () {
            $('#profile-image1').on('click', function () {
                $('#profile-image-upload').click();
            });
        });
        </script>



</body>

</html>