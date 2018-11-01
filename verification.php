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
        <br />
        <hr />
        <br />
    <h3 align="center">Please verify your details</h3>
    <br />
        <form action="confirm.php" method="POST">
            <p align="center">
                Name:
                <?php
                    if(isset($_SESSION['name']))
                    {
                        echo $_SESSION['name'];
                    }
                ?>
            </p>
            <p align="center">
                Email:
                <?php   
                    if(isset($_SESSION['email']))
                    {
                        echo $_SESSION['email'];
                    }
                ?>
            </p>
            <p align="center">
                Username:
                <?php   
                    if(isset($_SESSION['username']))
                    {
                        echo $_SESSION['username'];
                    }
                ?>
            </p>
            <p align="center">
                Password:
                <?php 
                    if(isset($_SESSION['password']))
                    {
                        echo $_SESSION['password'];
                    }
                ?>
            </p>
            <p align="center">
                Date:
                <?php 
                    if(isset($_SESSION['date']))
                    {
                        echo $_SESSION['date'];
                    }
                ?>
            </p>
            <p align="center">
                Month:
                <?php
                    if(isset($_SESSION['month']))
                    {
                        echo $_SESSION['month'];
                    }
                ?>
            </p>
            <p align="center">
                Year:
                <?php   
                    if(isset($_SESSION['year']))
                    {
                        echo $_SESSION['year'];
                    }
                ?>
            </p>
            <p align="center">
                Gender:
                <?php   
                    if(isset($_SESSION['gender']))
                    {
                        echo $_SESSION['gender'];
                    }
                ?>
            </p>
            <p align="center">
                Adsress:
                <?php
                    if(isset($_SESSION['address']))
                    {
                        echo $_SESSION['address'];
                    }
                ?>
            </p>
            <p align="center">
                City:
                <?php
                    if(isset($_SESSION['city']))
                    {
                        echo $_SESSION['city'];
                    }
                ?>
            </p>
            <p align="center">
                Mobile No:
                <?php
                    if(isset($_SESSION['mobile']))
                    {
                        echo $_SESSION['mobile'];
                    }
                ?>
            </p>
            <p align="center">
                <input type="submit" value="Submit" />
            </p>
        </form>
    </body>
</html>