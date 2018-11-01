<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Sign Up
        </title>
        <style type="text/css">
        input[type=text]
        {
            border-radius:5px;
            border-style:solid;
            border-color:lightgray;
            border-width:2px;
            padding-left:10px;
            padding-top:15px;
            padding-bottom:15px;
            padding-right:10px;
        }
        input[type=password]
        {
            border-radius:5px;
            border-style:solid;
            border-color:lightgray;
            border-width:2px;
            padding-left:10px;
            padding-top:15px;
            padding-bottom:15px;
            padding-right:10px;
        }
        input[type=number]
        {
            border-radius:5px;
            border-style:solid;
            border-color:lightgray;
            border-width:2px;
            padding-left:10px;
            padding-top:15px;
            padding-bottom:15px;
            padding-right:10px;
        }
        select
        {
            border-radius:5px;
            border-style:solid;
            border-color:lightgray;
            border-width:2px;
            padding-left:10px;
            padding-top:15px;
            padding-bottom:15px;
            padding-right:10px;
        }
        input[type=submit]
        {
            border-radius: 10px;
            width:50%;
            background-color:green;
            color:white;
            padding-top:20px;
            padding-bottom:20px;
            border-style:none;
        }
        a
        {
            color:green;
        }
        span
        {
            color:red;
        }
        </style>
    </head>
    <body>
        <?php
            if(isset($_POST['name']))
            {
                $name=$_POST['name'];
            }

            if(isset($_POST['email']))
            {
                $email=$_POST['email'];
            }

            if(isset($_POST['username']))
            {   
                $username=$_POST['username'];
            }

            if(isset($_POST['password']))
            {
                $password=$_POST['password'];
            }

            if(isset($_POST['confirmpassword']))
            {
                $confirmpassword=$_POST['confirmpassword'];
            }

            if(isset($_POST['confirmemail']))
            {
                $confirmemail=$_POST['confirmemail'];
            }

            if(isset($_POST['date']))
            {
                $date=$_POST['date'];
            }

            if(isset($_POST['month']))
            {
                $month=$_POST['month'];
            }

            if(isset($_POST['year']))
            {
                $year=$_POST['year'];
            }

            if(isset($_POST['gender']))
            {
                $gender=$_POST['gender'];
            }

            if(isset($_POST['share']))
            {
                $share=$_POST['share'];
            }

            if(isset($_POST['mobile']))
            {
                $mobile=$_POST['mobile'];
            }

            if(isset($_POST['address']))
            {
                $address=$_POST['address'];
            }

            if(isset($_POST['city']))
            {
                $city=$_POST['city'];
            }

            $error1=$error2=$error3=$error4=$error5=$error6=$error7=$error8=$error9="";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                if(isset($_POST['submit'])&&($_POST['submit']=="SIGN UP"))
                {
                    if(empty($name))
                    {
                        $error1="Please enter the name";
                    }

                    if(empty($username))
                    {
                        $error2="Please enter the username";
                    }

                    if(empty($email))
                    {
                        $error3="Please enter the email";
                    }

                    if($confirmemail!=$email)
                    {
                        $error4="Email are not matching";
                    }

                    if(empty($password))
                    {
                        $error5="Please enter the password";
                    }

                    if($confirmpassword!=$password)
                    {
                        $error6="Password are not matching";
                    }
                }

                if($error1=="" && $error2=="" && $error3=="" && $error4=="" && $error5=="" && $error6=="" && $error7=="" && $error8=="" && $error9=="")
                {
                    $_SESSION['name']=$name;
                    $_SESSION['username']=$username;
                    $_SESSION['email']=$email;
                    $_SESSION['password']=$password;
                    $_SESSION['date']=$date;
                    $_SESSION['month']=$month;
                    $_SESSION['year']=$year;
                    $_SESSION['gender']=$gender;
                    $_SESSION['mobile']=$mobile;
                    $_SESSION['city']=$city;
                    $_SESSION['address']=$address;
                    header('Location: verification.php');
                    exit();
                }
            }

            function test_input($data)
            {
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }

        ?>
        <h1 align="center">
            <img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="135" width="40%" title="bookshelf-logo" alt="bookshelf-logo" />
        </h1>
        <hr />
        <p align="center">
            <b style="font-size: 20px;">
                Sign Up with an email address and Username
            </b>
        </p>
        <div style="border-style:solid;border-width:2px;border-radius:2px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <p align="center">
                <input type="text" name="name" id="name" placeholder="Name" size=70 />
                <br />
                <span><?php echo $error1; ?></span>
            </p> 
            <p align="center">
                <input type="text" name="username" id="username" placeholder="Username" size=70 />
                <br />
                <span><?php echo $error2; ?></span>
            </p>
            <p align="center"> 
                <input type="text" name="email" id="email" placeholder="Email" size=70 />
                <br />
                <span><?php echo $error3; ?></span>
            </p>
            <p align="center">
                <input type="text" name="confirmemail" id="coonfirmemail" placeholder="Confirm email" size=70 />
                <br />
                <span><?php echo $error4; ?></span>
            </p>
            <p align="center">
                <input type="password" name="password" id="password" placeholder="Password" size=70 />
                <br />
                <span><?php echo $error5; ?></span>
            </p>
            <p align="center">
                <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" size=70 />
                <br />
                <span><?php echo $error6; ?></span>
            </p>
            <p align="center">
                <label for="mobileno">Mobile No</label>
                <br />
                <input type="text" size="20" name="mobile" id="mobile" placeholder="Mobile No" />
            </p>
            <p align="center">
                <label for="Adsress">Address</label>
                <br />
                <input type="text" size="20" name="address" id="address" placeholder="Address" />
            </p>
            <p align="center">
                <label for="city">City</label>
                <br />
                <select name="city">
                    <option value="Delhi">Delhi</option>
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Goa">Goa</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Banglore">Banglore</option>
                    <option value="Kerala">Kerala</option>
                    <option value="TamilNadu">Tamil Nadu</option>
                    <option value="Kolkota">Kolkota</option>
                </select
            </p>
            <p align="center">
                <input type="number" name="date" id="date" placeholder="10" min="01" max="31" size=10 />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <select name="month">
                    <option value="none">Month</option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="number" name="year" id="year" placeholder="2014" min="1965" max="2018" size=10 />
                <span><?php echo $error7; ?></span>
            </p>
            <p align="center">
                <input type="radio" name="gender" value="Male" />Male
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" value="Female" />Female
                <br />
                <span><?php echo $error8; ?></span>
            </p>
            <p align="center">
                <input type="checkbox" name="share" value="share" />Share my registration data with Spotify's content providers for marketing purposes.
                <br />
                <span><?php echo $error9; ?></span>
            </p>
            <p align="center">
                By clicking on Sign up, you agree to Bookshelf <a href="">terms & conditions</a> and <a href="">privacy policy</a>.
            </p>
            <p align="center">
                <input type="submit" value="SIGN UP" name="submit" />
            </p>
        </form>
        <p align="center">
            Already have an account?<a href="login.php">Log in</a> 
        </p>
        </div>
    </body>
</html>