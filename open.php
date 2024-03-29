<?php
    // session_start();
    require_once('connectDatabase.php');
?>

<?php
    include "loginOrNot.php";
    if(isset($_SESSION['username']) || isset($_SESSION['admin'])){

    }else{
        echo '<script>
            alert("You are in user mode you have to login as a admin or employer id to add vacancy...");
            history.back();
        </script>';
    }

    if(isset($_POST['submit'])){

        $Jtit =  mysqli_real_escape_string($conn,$_POST['title']);
        $comp =  mysqli_real_escape_string($conn,$_POST['compname']);
        $cont = mysqli_real_escape_string($conn,$_POST['contact']);
        $email =  mysqli_real_escape_string($conn,$_POST['email']);
        $expd = mysqli_real_escape_string($conn,$_POST['expdate']);
        $add = mysqli_real_escape_string($conn,$_POST['address']);
        $desc = mysqli_real_escape_string($conn, $_POST['desc']);
        // $desc = str_replace("'", "\'", "$desc");

        if($Jtit == '' || $comp == '' || $cont == '' || $add == '' || $desc == ''){
            echo ("<script>alert('Please Fill all the boxes and try again...');history.back();</script>");
        ?>
        <?php
        }else{
            $sql = "INSERT INTO `openvacancy` (`Job Title`, `Company`, `Contact`, `Email`, `Expiry Date`, `Address`, `Description`) VALUES ('$Jtit', '$comp', '$cont', '$email', '$expd', '$add', '$desc')";
            $result = mysqli_query($conn, $sql);
        
            if(!$result){
                echo "Data can't inserted !!!";
            }
            header("location: employerProfile.php");
        }
        // DELETE FROM jos_jomres_gdpr_optins WHERE `date_time` < '2020-10-21 08:21:22';
        // mysqli_close($conn);

    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Open Vacancy</title>
    <link rel="apple-touch-icon" sizes="120x120" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="register.css">
</head>

<body class="bg-light">
    <section class="vh-100 gradient-custom">
        <div class="container py- h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body bg-light p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 text-center mb-md-5">Open Vacancy</h3><hr>
                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <input type="text" name="title" id="title" class="form-control form-control-lg" />
                                            <label class="form-label" for="title">Job Title</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4 d-flex align-items-center">
                                        <div class="form-outline datepicker w-100">
                                            <input type="text" name="compname" class="form-control form-control-lg" id="company" />
                                            <label for="company" class="form-label">Company Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="tel" id="contact" name="contact" class="form-control form-control-lg" />
                                            <label class="form-label" for="contact">Contact</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="hidden" name="email" id="email" class="form-control form-control-lg" value="<?php echo $_SESSION['email']; ?>"/>
                                            <!-- <label class="form-label" for="email">Email</label> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="date" name="expdate" id="expdate" max="2022-12-31"
                                            class="form-control form-control-lg" />
                                            <label class="form-label" for="expdate">Expiry Date</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <input type="text" name="address" id="address"
                                            class="form-control form-control-lg" />
                                            <label class="form-label" for="address">Address</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-4 pb-2">
                                        <div class="form-outline">
                                            <textarea type="text" name="desc" id="description" class="form-control form-control-lg" rows="5" maxlength="500" minlength="50" placeholder="Job description you offer (minimum character is 50)...."></textarea>
                                            <label class="form-label" for="desc">Description</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-2 text-center">
                                    <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>