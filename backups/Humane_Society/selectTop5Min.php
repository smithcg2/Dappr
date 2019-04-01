<html>
<head>
    <title>Watauga Humane Society Database</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet1.css">
    <link rel="icon" src="images/favicon.png">
    <!--css and other information-->
    </head>
    <body>
        <div id="wrap">
            <div id="main">
        <a href="index.php" id="nostylelink"><div id ="titlebar">
            Watauga Humane Society Database
        </div></a>
            <div id="welcome">Top 5 Least Available Products</div>
            <center>
<?php
    include("config.php");

                    $select = "select * from inventory order by Quantity asc limit 5";
                    $result = $db->query($select);

                    
                   if ($result->num_rows > 0)
                   {
                    echo "<table width = \"90%;\" style = \"text-align: center;\"><tr><th>Product ID</th><th>Product Name</th><th>Quantity</th><th>Expiration_Date</th></tr>";
                  while($row = $result->fetch_assoc())
                  {
                        echo "<tr><td>".$row['Product_ID']."</td><td>".$row['Product_Name']."</td><td>
                       ".$row['Quantity']."</td><td>".$row['Expiration_Date']." </td></tr>";
                  }

                   echo "</table>";
                   } 
                   else
                   {
                    echo "0 results";
                   }


                
                


             
                
               
                               
                mysqli_close($db);
                
?>            
                

                </center>
                <div id="normal">
                <a href="index.php"><button>Back</button></a>
                </div>
            </div>
        </div>
</body>
</html>

