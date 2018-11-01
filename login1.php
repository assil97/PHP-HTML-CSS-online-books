<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login
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
    }
    input[type=password]
    {
        border-style:solid;
        border-radius:2px;
        border-width:2px;
        border-color:lightgray;
        padding-top:15px;
        padding-bottom:15px;
        padding-left:10px;
        padding-right:10px;
    }
    input[type=submit]
    {
        width:50%;
        border-style:none;
        border-radius:10px;
        background-color:green;
        text-align:center;
        color:white;
        word-spacing:2px;
        padding-left:10px;
        padding-right:10px;
        padding-top:15px;
        padding-bottom:15px;
    }
    span
    {
        color:red;
    }
    </style>
    </head>
    <body>
        <?php
        if(isset($_POST['email']))
        {   
            $email=$_POST['email'];
        }

        if(isset($_POST['password']))
        {
            $password=$_POST['password'];
        }

        $error1=$error2=$error3="";
        if($_SERVER['REQUEST_METHOD']=="POST")
        {
            if(isset($_POST['submit'])&&($_POST['submit']=="LOGIN"))
            {
                if(empty($email))
                {
                    $error1="Please enter the email address";
                }

                if(empty($password))
                {
                    $error2="Please enter the password";
                }
            }
            if($error1=="" && $error2=="")
            {
                $host="localhost";
                $username="root";
                $password="";

                $connection=mysqli_connect($host,$username,$password);

                if(!$connection)
                {
                    die("Connection Failed:".mysqli_connect_error());
                }

                $db=mysqli_select_db($connection,"online_book");

                if(!$db)
                {
                    echo "Database not selected:".mysqli_connect_error();
                }

                $email_sqli=mysqli_real_escape_string($connection,$_POST['email']);
                $password_sqli=mysqli_real_escape_string($connection,$_POST['password']);

                $select_username="SELECT EMAIL,PASSWORD FROM BOOK where email='$email_sqli' AND password='$password_sqli'";
                $select_username_database=mysqli_query($connection,$select_username);
                $confirm=mysqli_num_rows($select_username_database);

                if($confirm==1)
                {   
                    $_SESSION['email']=$email_sqli;
                    setcookie("user",$email_sqli,time()*(86400*60),"/");
                    header("Location: fiction.html");
                    exit();
                }
                else 
                {
                    $error3="Please enter valid email and password";
                }

            }
        }
        ?>
        <h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" title="bookshelf_logo" alt="bookshelf_logo" /></h1>
        <hr />
        <br />
        <h3 align="center">
            Please Login with your email address
        </h3>
        <br />
        <div style="border-radius:2px;border-style:solid;border-width:2px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <p align="center">
                <label for="email">Email</label>
                <br />
                <input type="text" name="email" id="email" size="60" placeholder="Email" /> 
                <br />
                <span><?php echo $error1; ?></span>
            </p>
            <p align="center">
                <label for="password">Password</label>
                <br />
                <input type="password" name="password" id="password" size="60" placeholder="Password" />
                <br />
                <span><?php echo $error2; ?></span>
            </p>
            <p align="center">
                <span><?php echo $error3; ?></span>
            </p>
            <p align="center">
                <a href="forgettenpassword.php">Forgetten Password?</a>
            </p>    
            <p align="center">
                <input type="submit" name="submit" id="submit" value="LOGIN" /> 
            </p>
        </form>
        </div> 
    </body>
</html>