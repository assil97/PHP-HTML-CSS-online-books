<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Confirmation Order
        </title>
        <style type="text/css">
        h1
        {
            color:green;
        }
        </style>
    </head>
    <body>
        <?php
            if(isset($_SESSION['creditnumber']))
            {
                $creditnumber=$_SESSION['creditnumber'];
            }

            if(isset($_SESSION['email']))
            {
                $email=$_SESSION['email'];
            }

            if(isset($_SESSION['creditname']))
            {
                $creditname=$_SESSION['creditname'];
            }

            if(isset($_SESSION['book']))
            {
                $book=$_SESSION['book'];
            }

            if(isset($_SESSION['ccv']))
            {
                $ccv=$_SESSION['ccv'];
            }

            if(isset($_SESSION['price']))
            {
                $price=$_SESSION['price'];
            }

            if(isset($_SESSION['city']))
            {
                $city=$_SESSION['city'];
            }

            if(isset($_SESSION['address']))
            {
                $address=$_SESSION['address'];
            }

            if(isset($_SESSION['mobile']))
            {
                $mobile=$_SESSION['mobile'];
            }

            $host="localhost";
            $username="root";
            $password="";

            $connection=mysqli_connect($host,$username,$password);

            if(!$connection)
            {
                die("Connection Failed:".mysqli_connect_error());
            }

            $select_db=mysqli_select_db($connection,"online_book");
            
            if(!$select_db)
            {
                echo "Database not selected:".mysqli_connect_error();
            }

            $create_table="CREATE TABLE FINALORDER(EMAIL VARCHAR(30),BOOK VARCHAR(20),PRICE INT,CREDITNUMBER VARCHAR(20),CREDITNAME VARCHAR(20),CCV INT,ADDRESS VARCHAR(20),CITY VARCHAR(20),MOBILE INT)";
            $create_table_connection=mysqli_query($connection,$create_table);

            $insert="INSERT INTO FINALORDER(EMAIL,BOOK,PRICE,CREDITNUMBER,CREDITNAME,CCV,ADDRESS,CITY,MOBILE) VALUES('{$email}','{$book}','{$price}','{$creditnumber}','{$creditname}','{$ccv}','{$address}','{$city}','{$mobile}')";
            $insert_connection=mysqli_query($connection,$insert);
        
            mysqli_close($connection);

        session_destroy();
        ?>
        <h1 align="center"><a href="autobiography.html"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" /></a></h1>
        <hr />
        <br />
        <h1 align="center">Order Confirmed</h1>
        <p align="center">
            Your Order will delievered within 3 or 4 working days
        </p>
    </body>
</html>

