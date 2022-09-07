<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>91bytes-assiggnnment</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <link rel="preload" href="css/font/Athiti-SemiBold/Athiti-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
</head>
<body>

    <?php
    
    require "dbcon.php";
    if(isset($_POST['submit'])){
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);


        $pass = password_hash($password, PASSWORD_BCRYPT);

        $emailquery = "select * from users where email_id = '$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            // echo "email already exists";
            $errormsg =  "Email already exists";
        }
        else{
            $insertquery = "INSERT INTO users(full_name, email_id, password) VALUES ('$full_name', '$email', '$pass')";

            $iquery = mysqli_query($con, $insertquery);

            if($iquery){
                // echo "inserted";
                $succmsg = "User has been inserted";
                
            }else{
                // echo "failed";
                $errormsg =  "Sorry! Please try again letter";
            }
        }
    }

    ?>

    <div class="container">
    <div class="wrapper">
        <div id="auth" class="authentication">
        <div class="wrapper">
            <div id="login" class="card active">
            <div class="wrapper">
                <div class="animation form login">
                <div class="wrapper">
                <nav>

                    <a href="#"><img alt="logo" src="images/logo.png"> Bellefit</a>
                </nav>
                <div class="form-container">
                    <form method="POST">
                         <div class="name form-group input">
                            <input type="text" name="full_name" id="full_name" class="user-name" placeholder="Full Name" required>
                        </div>
                        <div class="form-group input">
                            
                            <input type="email" name="email" id="email" class="user-email" placeholder="Email Address" required>
                        </div>
                        <div class="form-group input">
                            
                            <input type="password" name="password" id="user-password-login" class="user-password" placeholder="Password" required>
                        </div>
                        <div class="form-group input">
                        <label for="tnc" class="tnc"><input type="checkbox" name="tnc" id="tnc" required>
                            I agree with <span>Terms</span> and <span>Privacy</span> </label>
                        </div>

                        <div class="form-group">
                            <p class="succsess-msg"><?php echo $succmsg; ?></p>
                            <p class="error-msg"><?php echo $errormsg; ?></p>
                        </div>

                        <div class="form-group input">
                            
                            <input type="submit" name="submit" id="user-password-login" class="submit-btn" value="SIGN UP">
                        </div>
                    </form>
                </div>
                </div>
                </div>
                <div class="animation note login">
                <div class="wrapper-img">
                    <img src="images/object.png" alt="" width="310">
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</body>
</html>