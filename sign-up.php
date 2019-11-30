
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up - PBoard</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="css/main.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css"/>
    <link href="css/bootstrap-reboot.css" rel="stylesheet" type="text/css"/>
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
                <a class="nav-link" href="features.html">FEATURES</a>
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
    <br />
    <h1 class="text-center dark">Sign Up</h1>
    <div class='container' id="main-section-container">
        <div class="container" id="sign-up-box">
            <form action="php/sign-up.php" method="post" id="sign-up-form">
                <div class="row">
                    <div class="col">
                        <label>
                            First Name
                        </label>
                        <br />
                        <input id='first-name' class= 'form-control' name="first-name"/>
                        <p class="feedback"></p>
                    </div>

                    <div class="col">
                        <label>
                            Last Name
                        </label>
                        <br />
                        <input id='last-name' class= 'form-control'  name="last-name"/>
                        <p class="feedback"></p>
                    </div>
                </div>
                <br />
                <label>Email</label>
                <br />
                <input id='email' class= 'form-control ' value="<?php if(!empty($_GET['email'])) echo $_GET['email']?>" name="email"/>
                    <p class="feedback"></p>
                    <br />
                <label>Password</label>
                <br />
                <input id='password' type='password' class= 'form-control' name="password"/>
                    <p class="feedback"></p>
                    <br />
                <label>Confirm Password</label>
                <br />
                <input id='confirm-password' type='password' class= 'form-control' name="password"/>
                    <p class="feedback"></p>
                    <br />
                <hr />
                <p class="text-center"><button type="submit" class="btn btn-primary btn-lg btn-block" name="sign-up-submit">Submit</button>
                </p>
                <p id="sign-up-feedback"></p>
            </form>
        </div>
    </div>
</section>
<footer id="footer">
    <p class="text-center">© PBOARD 2019 | Designed with ❤ by Hasnain Naeem.</p>
</footer>
<script src="js/sign-up.js"></script>
</body>
</html>