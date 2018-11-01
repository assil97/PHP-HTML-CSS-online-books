<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
.img-zoom-container {
  position: relative;
}
.img-zoom-lens {
  position: absolute;
  border: 1px solid #d4d4d4;
  /*set the size of the lens:*/
  width: 40px;
  height: 40px;
}
.img-zoom-result {
  border: 1px solid #d4d4d4;
  /*set the size of the result div:*/
  width: 87px;
  height: 87px;
}
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 24px;
  padding:20px;
  width: 190px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;

}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
  .okay
  {
    padding-left: 50em;
    color: #f1f1f1;
    width: 50%;
    padding-top: 36px;
  }
    p{
    font-size: 28px;
    font-family: verdana
  }
  #one
  {
    float:right;
  }
  #two
  {
    float:left;
  }
  #three
  {
    float:center;
  }
</style>
</head>
<body>
<h1 align="center"><img src="privacy_files/Burack's+Bookshelf-logo-black.png" height="150" width="40%" alt="" title="" /></h1>
<hr />
<br />
    <?php 
        $book="Gandhi:A Life";
        $price=1440;
    ?>
<table id="one">
  <tr>
    <td><h1 style="font-size: 36px;font-family: verdana">Gandhi:A Life</h1></td></tr>
    <?php $_SESSION['book']=$book; ?>
<tr><td><p> MRP <strike>Rs1600</strike> (Inclusive of all taxes) </p></td></tr>
<tr><td><p>Rs.1440 &nbsp &nbsp<b style="font-size: 28px">10% OFF </b></p></td></tr>
<?php $_SESSION['price']=$price; ?>
<tr><td><h1 style="font-size: 30px;font-family: sans-serif;">Ratings</h1></td></tr>
<tr><td><p>&nbsp&nbspGoodreads:3.2/5</p></td></tr>
<tr><td><p>&nbsp&nbspBooklikes:3.6/5</p></td></tr>
<tr><td><p>&nbsp&nbspThe New York Times:3.1/5</p></td></tr>
<tr><td><button class="button"><a href="login.php"><span>BUY NOW </span></a></button></td></tr>
</table>
<table id="two">
  <tr><td><img id="myimage" src="gan1.jpg" width="450" height="700"></td></tr>
</table>
<table id="three">
  <tr><td><img id="myimage" src="gan2.jpg" width="500" height="700"></td></tr>
</table>
</body>
</html>
