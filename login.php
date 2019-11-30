<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - PBoard</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvp
    Q+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="js/jquery.js"></script>
</head>

<style>
    div#sign-up-box {
        max-width: 40%;
        box-shadow: #424242 0 0 10px;
        padding: 5%;
    }

    html, body {
        height: 94%;
    }

    #wrap {
        min-height: 100%;
    }

    #footer {
        height: 7%;
    }

    .btn-primary {
        background-color: #3b55e6 !important;
        border-radius: 20px !important;
        text-transform: uppercase;
        border: none;
        padding: 2% 6%;
    }

    .btn-primary:hover {
        background-color: #007bff !important;
    }

    .warning {
        color: red;
    }

    .feedback {
        color: green;
    }
</style>
<body>

<!-- Navigation menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.html"><b>PBoard</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.html">HOME <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">FEATURES</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">ABOUT</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">BLOG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">CONTACT</a>
            </li>
        </ul>
        <div class="inline float-right">

        </div>
        <div class="navbar-nav ml-auto">
            <button type="button" class="btn btn-outline-light my-2 my-sm-0"><a class="light simple" href="login.php">Login</a></button>&nbsp
            <button type="button" class="btn btn-outline-light my-2 my-sm-0"><a class="light simple" href="sign-up.php">Join</a></button>
        </div>
    </div>
</nav>
<!-- Main section -->
<section id="wrap">
    <br />
    <br />
    <br />

    <h1 class="text-center dark">Log In</h1>
    <div class='container' id="main-section-container">
        <div class="container" id="sign-up-box">
            <form action="php/login.php" method="post" id="login-form">
                <label>Your Email</label>
                <br />
                <input id='email' class= 'form-control' placeholder="username@example.com" value="<?php if(!empty($_GET['email'])) echo $_GET['email']?>" name="email"/>
                <br />
                <label>Password</label>
                <br />
                <input id='password' type='password' class= 'form-control' name="password" placeholder="********"/>
                <br />
                <p class="text-center"><a href="forgot-password.html">Forgot your password?</a></p>
                <hr />
                <p class="text-center"><button type="submit" class="btn btn-primary btn-lg btn-lg btn-block">Login</button></p>
                <p id="login-feedback"></p>
            </form>
        </div>
    </div>
</section>
<footer id="footer">
    <p class="text-center">© PBOARD 2019 | Designed with ❤ by Hasnain Naeem.</p>
</footer>
<script>
    // Sending data to Back-end script
    $loginForm = $("#login-form");
    $loginForm.submit(function(e) {
        e.preventDefault();
        email = $("#email").val();
        password = $("#password").val();
        if(email=="" || password=="")
        {
            $loginForm.find("#login-feedback").text(
                "Enter email & password to proceed.").hide().attr("class", "warning").fadeIn();
        }
        else {
            let details = $loginForm.serialize();
            $.post("php/login.php", details, function(data){
                if(data=="failure") {
                    let $data = $("#login-feedback").text("You entered wrong email or password. Try again.");
                    $data.attr("class", "warning");
                }
                else {
                    window.location.replace("dashboard.html");
                }
            });
        }
    });

</script>
</body>
</html>