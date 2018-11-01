<!DOCTYPE html>
<html>
<head>
    <title>
        Check Payment
    </title>
    <style type="text/css">
    input[type=submit] 
    {
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
    </style>
</head>
<body>
    <h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" alt="" title="" /></h1>
    <hr />
    <br />
    <h3 align="center">Please choose the type of payment</h3>
    <div style="border-style:solid;border-width:2px;border-radius:2px;">
        <form action="credit.php">
            <p align="center">
            <input type="submit" name="submit" value="Credit Card" />
            </p>
        </form>
        <br />
        <form action="debitcard.php">
            <p align="center">
            <input type="submit" name="submit" value="Debit Card" />
            </p>
        </form>
        <br />
        <form action="mainpage.php">
            <p align="center">
            <input type="submit" name="submit" value="Cash On Delievery" />
            </p>
        </form>
    </div>
</body>
</html>