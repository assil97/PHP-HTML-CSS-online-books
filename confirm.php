<?php   
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Confirm
        </title>
    </head>
    <body>
    <h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" alt="" title="" /></h1>
    <hr />
    <br />
        <?php
            if(isset($_SESSION['name']))
            {
                $name=$_SESSION['name'];
            }

            if(isset($_SESSION['email']))
            {
                $email=$_SESSION['email'];
            }

            if(isset($_SESSION['username']))
            {
                $username=$_SESSION['username'];
            }

            if(isset($_SESSION['password']))
            {
                $password=$_SESSION['password'];
            }

            if(isset($_SESSION['date']))
            {
                $date=$_SESSION['date'];
            }

            if(isset($_SESSION['month']))
            {
                $month=$_SESSION['month'];
            }

            if(isset($_SESSION['year']))
            {
                $year=$_SESSION['year'];
            }

            if(isset($_SESSION['gender']))
            {
                $gender=$_SESSION['gender'];
            } 
                
            if(isset($_SESSION['address']))
            {
                $address=$_SESSION['address'];
            }

            if(isset($_SESSION['city']))
            {
                $city=$_SESSION['city'];
            }
                    
            if(isset($_SESSION['mobile']))
            {
                $mobile=$_SESSION['mobile'];
            }
        ?>
        <?php
            $host="localhost";
            $username_mysql="root";
            $password_mysql="";

            $connection=mysqli_connect($host,$username_mysql,$password_mysql);

            if(!$connection)
            {
                die("Connection Failed:".mysqli_connect_error());
            }

            $select_database=mysqli_select_db($connection,"online_book");

            if(!$select_database)
            {
                echo "Database not selected:".mysqli_connect_error();
            }

            $create_table="CREATE TABLE USER(NAME VARCHAR(20),EMAIL VARCHAR(30),USERNAME VARCHAR(20),PASSWORD VARCHAR(20),DATE VARCHAR(20),MONTH VARCHAR(20),YEAR INT,GENDER VARCHAR(20),ADDRESS VARCHAR(20),CITY VARCHAR(20),MOBILE INT)";
            $create_table_connection=mysqli_query($connection,$create_table);

            $insert_table="INSERT INTO USER(NAME,EMAIL,USERNAME,PASSWORD,DATE,MONTH,YEAR,GENDER,ADDRESS,CITY,MOBILE) VALUES ('{$name}','{$email}','{$username}','{$password}','{$date}','{$month}',{$year},'{$gender}','{$address}','{$city}','{$mobile}')";
            $insert_table_connection=mysqli_query($connection,$insert_table);

            if($insert_table_connection)
            {
                setcookie("user",$username,time()*(86400*7));
                header("Location: autobiography.html");
                exit();
            }

            mysqli_close($connection);
        ?>
        <form action="autobiography.html">
            <p align="center">
            <input type="submit" name="Submit" id="submit" />
            </p>
        </form>
    </body>
</html>
