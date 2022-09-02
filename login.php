<?php 
    session_start(); 
    require_once('connectDatabase.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style><?php include "login.css"; ?></style>
    <link rel="stylesheet" href="logo\logo.css">

    <title>User Login</title>
    <?php include "favicon.html" ?>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5" id="imageWrapper">
                    <img src="images/employee.jfif" id="employeeImg" class="img-fluid w-100" alt="Reponsive image">
                    <center><h2 id="logo" class="text-center mb-4 mb-4">fEmployee</h2></center>
                    <input type="button" id="swipe" value="Employer" class="btn btn-primary btn-lg" style="width: 300px; margin: 0 auto; padding-left: 2.5rem; padding-right: 2.5rem;" />
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mt-4" id="formWrapper">
                    <form action="loginEmployer.php" id="login_form" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in as a <b>Employer</b></p>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Or</p>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" name="mail" id="form3Example3" value="<?php 
                                if(isset($_COOKIE["mail"])) {
                                    echo $_COOKIE["mail"]; 
                                } 
                            ?>"
                            class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label id="error_email" class="form-label" for="form3Example3" style="color: red;"></label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="passo" id="form3Example4" value="<?php
                                if(isset($_COOKIE["passw"])) {
                                    echo $_COOKIE["passw"]; 
                                } 
                            ?>"
                            class="form-control form-control-lg" placeholder="Enter password" />
                            <label id="error_password" class="form-label" for="form3Example4" style="color: red;"></label>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4" name="error" id="error"></label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" name="rem" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <!-- <a href="forgot.php" class="text-body">Forgot password?</a> -->
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <div class="mt4 text-end justify-content-around w-100" >
                                <input type="submit" name="ok" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                                <!-- <a href="signup.html">
                                    <button type="button" name="signupbtn" class="btn btn-danger btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                                </a> -->
                            </div>
                                
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                                <a href="signup.html">Register</a>
                            </p>
                        </div>

                    </form>
                    <form action="loginJobseeker.php" id="login_employer" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-start">
                            <p class="lead fw-normal mb-0 me-3">Sign in as a <b>JobSeeker</b></p>
                        </div>
                        <div class="divider d-flex align-items-center my-4">
                            <!-- <p class="text-center fw-bold mx-3 mb-0">Or</p> -->
                        </div>
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form3Example3" value="<?php 
                                if(isset($_COOKIE["email"])) {
                                    echo $_COOKIE["email"]; 
                                } 
                            ?>"
                            class="form-control form-control-lg" placeholder="Enter a valid email address" />
                            <label id="error_email" class="form-label" for="form3Example3" style="color: red;"></label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" name="pass" id="form3Example4" value="<?php
                                if(isset($_COOKIE["password"])) {
                                    echo $_COOKIE["password"]; 
                                } 
                            ?>"
                            class="form-control form-control-lg" placeholder="Enter password" />
                            <label id="error_password" class="form-label" for="form3Example4" style="color: red;"></label>
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4" name="error" id="error"></label>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" name="remember" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                            </div>
                            <!-- <a href="forgot.php" class="text-body">Forgot password?</a> -->
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <div class="mt4 text-end justify-content-around w-100" >
                                <input type="submit" name="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" value="Login">
                                <!-- <a href="signup.html">
                                    <button type="button" name="signupbtn" class="btn btn-danger btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Sign Up</button>
                                </a> -->
                            </div>
                                
                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account?
                                <a href="registration.html">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</body>
<script>
    document.getElementById('swipe').addEventListener('click', ()=>{
        if(document.getElementById('imageWrapper').style.left === '0%'){
            document.getElementById('imageWrapper').style.left = '50%';
            document.getElementById('swipe').value = 'JobSeeker';
        }else{
            document.getElementById('imageWrapper').style.left = '0%';
            document.getElementById('swipe').value = 'Employer';
        }
    });
</script>

</html>