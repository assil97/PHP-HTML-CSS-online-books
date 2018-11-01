<?php
    require_once('connect.php');
    if(isset($_POST['email']))
    {
        $email=$_POST['email'];
    }
    
    if(isset($_POST['username']))
    {
        $username=$_POST['username'];
    }

    $error1=$error2=$error3="";
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['submit'])&&($_POST['submit']=="Submit"))
        {
            if(empty($email))
            {
                $error1="Please enter the email";
            }

            if(empty($username))
            {
                 $error2="Please enter the username";
            }
        }

        if($error1=="" && $error2=="")
        {
            $email_sqli=mysqli_real_escape_string($connection,$_POST['email']);
            $username_sqli=mysqli_real_escape_string($connection,$_POST['username']);

            $select_username_email="SELECT EMAIL,USERNAME FROM BOOK WHERE EMAIL='$email_sqli' AND USERNAME='$username_sqli'";
            $select_username_email_connection=mysqli_query($connection,$select_username_email);
            $count=mysqli_num_rows($select_username_email_connection);

            if($count==1)
            {
                $row=mysqli_fetch_assoc($select_username_email_connection);
                $password=$row['password'];
                $to=$row['email'];
                $subject="You recovered Password";

                $message="Please use this password to login".$password;
                $headers="From:bookshelf@gmail.in";
                if(mail($to,$from,$message,$headers))
                {
                    echo "Your password have been sent to email id";
                }
                else 
                {
                    echo "Failed to recover your password";
                }
            }
            else
            {
                $error3="Invalid Username and Email";
            }
        }
    }
?>
<!DOCTYPE html>
<html>  
    <head>
        <title>
            Forgetten Password
        </title>
        <style type="text/css">
        input[type=text]
        {
            border-style:solid;
            border-radius:2px;
            border-width:2px;
            border-color:lightgray;
            padding-top:15px;
            padding-bottom:15px;
            padding-left:10px;
            padding-right:10px;
            width:50%;
        }
        input[type=submit]
        {
            border-style:solid;
            border-width:2px;
            border-color:lightgray;
            border-radius:5px;
            text-align:center;
            background-color:green;
            color:white;
            width:50%;
            padding-top:15px;
            padding-bottom:15px;
            padding-left:10px;
            padding-right:10px;
        }
        span 
        {
            color:red;
        }
        </style>
    </head>
    <body>
        <h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" alt="" title="" /></h1>
        <hr />
        <br />
        <p align="center">
            <h3 align="center">Please enter your email and username</h3>
        </p>
        <div style="border-radius:2px;border-style:solid;border-width:2px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <p align="center">
                <label for="">Email</label>
                <br />
                <input type="text" placeholder="email" name="email" id="email" size="60" />
                <br />
                <span><?php echo $error1; ?></span>
            </p>
            <p align="center">
                <label for="username">Username</label>
                <br />
                <input type="text" placeholder="username" name="username" id="username" size="60" />
                <br />
                <span><?php echo $error2; ?></span>
            </p>
            <p align="center">
                <span><?php echo $error3; ?></span>
            </p>
            <p align="center">
                <input type="submit" name="submit" value="Submit" />
            </p>
        </form>
        </div>
    </body>
</html>