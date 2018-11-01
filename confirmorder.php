<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Confirm Order
        </title>
        <style type="text/css">
        .left
        {
            width:75%;
            float:left;
        }
        .right
        {
            width:25%;
            float:right;
        }
        td
        {
            color:blue;
        }
        table
        {
            border-radius:2px;
            border-style:solid;
            border-width:2px;
            width:100%;
        }
        input[type=submit]
        {
            border-style:none;
            border-radius:2px;
            background-color:green;
            color:white;
            width:30%;
            padding-top:10px;
            padding-bottom:10px;
            padding-left:15px;
            padding-right:15px;
        }
        </style>
    </head>
    <body>
        <?php
             $delievery_price=50;
        ?>
        <h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" alt="" title="" /></h1>
        <hr />
        <br />
        <div class="left">
            <p align="center">
                Your order is as follows:
            </p>
            <p align="center">
                Book:
                <?php
                    if(isset($_SESSION['book']))
                    {   
                        $book=$_SESSION['book'];
                        echo $book;
                    }
                ?>
            </p>
            <p align="center">
                Email:
                <?php
                    if(isset($_SESSION['email'])) 
                    {
                        $email=$_SESSION['email'];
                        echo $email;
                    }
                ?>
            </p>
            <p align="center">
                Quantity:1
            </p>    
            <p align="center">
                    Credit Number:
                <?php
                    if(isset($_SESSION['creditnumber']))
                    {
                        $creditnumber=$_SESSION['creditnumber'];
                        echo $creditnumber;
                    }
                ?>
            </p>
            <p align="center">
                    Credit Name:
                    <?php
                        if(isset($_SESSION['creditname']))
                        {
                            $creditname=$_SESSION['creditname'];
                            echo $creditname;
                        }
                    ?>
            </p>
            <p align="center">
                        CCV:
                        <?php   
                            if(isset($_SESSION['ccv']))
                            {
                                $ccv=$_SESSION['ccv'];
                                echo $ccv;
                            } 
                        ?>
            </p>
            <p align="center">
                    Address:
                    <?php
                        if(isset($_SESSION['address']))
                        {
                            $address=$_SESSION['address'];
                            echo $address;
                        }
                    ?>
            </p>
            <p align="center">
                    City:
                    <?php
                        if(isset($_SESSION['city']))
                        {
                            $city=$_SESSION['city'];
                            echo $city;
                        }
                    ?>
            </p>
            <p align="center">
                Mobile:
                <?php
                    if(isset($_SESSION['mobile']))
                    {
                        $mobile=$_SESSION['mobile'];
                        echo $mobile;
                    }
                ?>
            </p>
            <form action="orderconfirmed.php">
                <p align="center">
                <input type="submit" name="submit" value="Confirm Order" />
                </p>
            </form>
            </div>
        </div>
        <div class="right">
            <table>
                <tr>
                    <td>
                        Pricing section
                    </td>
                </tr>
                <tr>
                        <td>Price:</td>
                        &nbsp;&nbsp;
                        <td>
                            <?php
                                if(isset($_SESSION['price']))
                                {
                                    $price=$_SESSION['price'];
                                    echo $price;
                                }
                            ?>
                </tr>
                <tr>
                        <td>Delievery Charges:</td>
                        <td>
                            <?php
                                echo $delievery_price;
                            ?>
                        </td>
                </tr>
                <tr>
                    <td>
                        Total Price:
                    </td>
                    &nbsp;&nbsp;
                    <td>
                        <?php   
                            if(isset($_SESSION['price']))
                            {
                                $totalprice=$_SESSION['price']+$delievery_price;
                                echo $totalprice;
                            }
                        ?>
                    </td>
                </tr>
            </table> 
        </div>
    </body>
</html>