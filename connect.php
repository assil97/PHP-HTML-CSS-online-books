<?php
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
?>
