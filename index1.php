<!DOCTYPE html>
<html>

<head>
    <title>P.PHUKA HERB - สมนไพรพ่อปู่พูคา </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/w3-css.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    .w3-sidebar a {
        font-family: "Roboto", sans-serif
    }

    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .w3-wide {
        font-family: "Montserrat", sans-serif;
    }
</style>

<body class="w3-content" style="max-width:1200px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <div class="w3-display-container w3-container">
                <img src="img/logoaa.png" alt="home-sale" style="width:100%">
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <a href="#" class="w3-bar-item w3-button">หนัาหลัก</a>
                <a href="#" class="w3-bar-item w3-button">เกี่ยวกับเรา</a>
                <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                    สินค้า <i class="fa fa-caret-down"></i>
                </a>
                <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>menu3</a>
                    <a href="#" class="w3-bar-item w3-button">menusub1</a>
                    <a href="#" class="w3-bar-item w3-button">menusub2</a>
                    <a href="#" class="w3-bar-item w3-button">menusub3</a>
                </div>
                <a href="./register.php" class="w3-bar-item w3-button">สมัครสมาชิก</a>
                <a href="./login.php" class="w3-bar-item w3-button">เข้าสู่ระบบ</a>
                <a href="#" class="w3-bar-item w3-button">menu6</a>
                <a href="#" class="w3-bar-item w3-button">menu7</a>
            </div>
        </nav>
        <!-- Top menu on small screens -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">P.PHUKA HERB</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:250px">
            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>
            <!-- Top header -->
            <header class="w3-container w3-teal">
                <p class="w3-left">สมุนไพรพ่อปู่พูคา</p>
                <p class="w3-right">
                    <i class="fa fa-shopping-cart w3-margin-right"></i>
                    <i class="fa fa-search"></i>
                    <i class="fa fa-login"></i>
                </p>
            </header>
            <!-- Image header -->
            <div class="w3-display-container w3-container">
                <img src="img/index/pli.jpg" alt="home-sale" style="width:100%">
                <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
                <!--                 <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
                <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
                <h1 class="w3-hide-small">COLLECTION 2016</h1> -->
                <p><a href="#home-sale" class="w3-button w3-black w3-padding-large w3-large">ซื้อเดี๋ยวนี้!</a></p>
            </div>
        </div>
        <div class="w3-container w3-text-grey" id="home-sale">
            <p>8 items</p>
        </div>
        <!-- Product grid -->
        <div class="w3-row w3-grayscale">
            <div class="w3-col l3 s6">
                <div class="w3-container">
                	<div class="w3-display-container">
                        <img src="img/index/imgshop1.jpg" style="width:100%">
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <p>น้ำมันไพล<br><b>฿120</b></p>
                </div>
                <div class="w3-container">
                	<div class="w3-display-container">
                        <img src="img/index/imgshop2.jpg" style="width:100%">
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <p>น้ำมันนวดไพลสด<br><b>฿120</b></p>
                </div>
            </div>
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="img/index/imgshop3.jpg" style="width:100%">
                        <span class="w3-tag w3-display-topleft">แนะนำ</span>
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <p>น้ำมันไพลหอม<br><b>฿120</b></p>
                </div>
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="img/index/imgshop4.jpg" style="width:100%">
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                        <p>น้ำมันไพล4<br><b>฿120</b></p>
                    </div>
                </div>
            </div>
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="img/index/imgshop5.jpg" style="width:100%">
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                        <p>น้ำมันไพล5<br><b>฿120</b></p>
                    </div>
                </div>
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="img/index/imgshop6.jpg" style="width:100%">
                        <span class="w3-tag w3-display-topleft">ขายดี</span>
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                    <p>น้ำมันไพล4<br><b class="w3-text-red">฿120</b></p>
                </div>
            </div>
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <div class="w3-display-container">
                        <img src="img/index/imgshop1.jpg" style="width:100%">
                        <div class="w3-display-middle w3-display-hover">
                            <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                        </div>
                        <p>น้ำมันไพล4<br><b>฿120</b></p>
                    </div>
                    <div class="w3-container">
                        <div class="w3-display-container">
                            <img src="img/index/imgshop2.jpg" style="width:100%">
                            <div class="w3-display-middle w3-display-hover">
                                <button class="w3-button w3-black">ซื้อเลย <i class="fa fa-shopping-cart"></i></button>
                            </div>
                            <p>น้ำมันไพล4<br><b>฿120</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End page content -->
        </div>
        <header class="w3-black w3-center w3-padding-24">
            <p class="w3-center">&copy; Copyright 2019, P.PHUKA HERB Corporation Powered by <a href="#" class="w3-hover-opacity">Nukrobzero</a>
            </p>
        </header>
        <script>
        // Accordion 
        function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }

        // Click on the "home-sale" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn").click();


        // Open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
</body>

</html>