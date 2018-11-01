<?php   
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            debit 
        </title>
    </head>
    <style type="text/css">
    input[type=text]
    {   
        padding-left:10px;
        padding-right:10px;
        padding-top:15px;
        padding-bottom:15px;
        width:30%;
        border-style:solid;
        border-width:2px;
        border-color:lightgray;
        border-radius:2px;
    }
    input[type=select]
    {
        padding-left:10px;
        padding-right:10px;
        padding-top:15px;
        padding-bottom:15px;
        width:30%;
        border-style:solid;
        border-width:;
        border-color:lightgray;
        border-radius:2px;
    }
    input[type=password]
    {
        padding-left:10px;
        padding-right:10px;
        padding-top:15px;
        padding-bottom:15px;
        width:30%;
        border-style:solid;
        border-width:2px;
        border-color:lightgray;
        border-radius:2px;
    }
    input[type=submit]
        {
            border-style:none;
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
    <body>
         <h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" alt="" title="" /></h1>
        <hr />
        <br />
        <?php
            if(isset($_POST['debitnumber']))
            {
                $debitnumber=$_POST['debitnumber'];
            }

            if(isset($_POST['debitname']))
            {
                $debitname=$_POST['debitname'];
            }

            if(isset($_POST['bank']))
            {
                $bank=$_POST['bank'];
            }

            if(isset($_POST['ccv']))
            {
                $ccv=$_POST['ccv'];
            }

            if(isset($_POST['month']))
            {
                $expirymonth=$_POST['month'];
            }

            if(isset($_POST['year']))
            {
                $expiryyear=$_POST['year'];
            }
        ?>
        <?php
            $error1=$error2=$error3="";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                if(isset($_POST['submit'])&&($_POST['submit']=="Submit"))
                {
                    if(empty($debitname))
                    {
                        $error1="Please enter the debit card name";
                    }   

                    if(empty($debitnumber))
                    {
                        $error2="Please enter the debit card number";
                    }
                    else 
                    {
                        test_input($debitnumber);
                        if(!preg_match("/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/",$debitnumber))
                        {
                            $error2="Please provide the debit number";
                        }
                    }

                    if(empty($ccv))
                    {
                        $error3="Please enter the ccv number";
                    }
                    else 
                    {
                        test_input($ccv);
                        if(!preg_match("/^[0-9]{3}$/",$ccv))
                        {
                            $error3="Please provide the ccv";
                        }
                    }
                }
                if($error1=="" && $error2=="" && $error3=="")
                {
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

                    $create_table="CREATE TABLE DEBIT1(DEBITNAME VARCHAR(20),DEBITNUMBER VARCHAR(20),BANK VARCHAR(20),CCV INT,EXPIRYMONTH INT,EXPIRYYEAR INT)";
                    $create_table_connection=mysqli_query($connection,$create_table);

                    $insert_into="INSERT INTO DEBIT1(DEBITNAME,DEBITNUMBER,BANK,CCV,EXPIRYMONTH,EXPIRYYEAR) VALUES ('{$debitname}','{$debitnumber}','{$bank}','{$ccv}','{$expirymonth}','{$expiryyear}')";
                    $insert_into_connection=mysqli_query($connection,$insert_into);

                    if($insert_into_connection)
                    {
                        $_SESSION['creditname']=$debitname;
                        $_SESSION['creditnumber']=$debitnumber;
                        $_SESSION['bank']=$bank;
                        $_SESSION['ccv']=$ccv;
                        $_SESSION['month']=$expirymonth;
                        $_SESSION['year']=$expiryyear;
                        header("Location: confirmorder.php");
                        exit();
                    }
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
        <h3 align="center">Please provide your card details for purchasing</h3>
        <div style="border-style:solid;border-style:2px;border-radius:2px;">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <p align="center">  
            <label for="debitname">Debit Name:</label>
            <br />
            <input type="text" name="debitname" id="debitname" placeholder="Debit Holder" size="20" />
            <br />
            <span><?php echo $error1; ?></span>
        </p>
        <p align="center">
            <label for="debitnumber">Debit Number:</label>
            <br />
            <input type="text" name="debitnumber" id="debitnumber" placeholder="Debit Number" size="20" />
            <br />
            <span><?php echo $error2; ?></span>
        </p>
        <p align="center">
            <label for="bank">Bank</label>
            <br />
            <select name="bank">
                <option>State Bank of India</option>
                <option>Oriental Bank of Commerce</option>
                <option>ICICI Bank</option>
                <option>Axis Bank</option>
                <option>Andhra Bank</option>
                <option>State Bank of Hyderabad</option>
                <option>HDFC Bank</option>
            </select>
        </p>
        <p align="center">
            <label for="expirymonth">Expiry Month</label>
            <br />
            <select name="month">
                <option value="01">January(01)</option>
                <option value="02">February(02)</option>
                <option value="03">March(03)</option>
                <option value="04">April(04)</option>
                <option value="05">May(05)</option>
                <option value="06">June(06)</option>
                <option value="07">July(07)</option>
                <option value="08">August(08)</option>
                <option value="09">September(09)</option>
                <option value="10">October(10)</option>
                <option value="11">November(11)</option>
                <option value="12">December(12)</option>
            </select>
        </p>
        <p align="center">
            <label for="ccv">CCV</label>
            <br />
            <input type="password" name="ccv"  id="ccv" placeholder="ccv" size="10" />
            <br />
            <span><?php echo $error3; ?></span>
        </p>
        <p align="center">
            <label for="expiryyear">Expiry Year</label>
            <br />
            <select name="year">
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
                <option value="2031">2031</option>
            </select>
        </p>    
        <p align="center">
            <input type="submit" name="submit" value="Submit" />
        </p>
        </form>
        </div>
    </body>
</html>