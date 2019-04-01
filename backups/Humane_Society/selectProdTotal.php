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
            <div id="welcome">Average Price of Entire Inventory </div>
            <center>
<?php
    include("config.php");

                    $select = "Select sum(Product_Price * Quantity) AS aver from inventory";
                    $result = $db->query($select);

                    
                   if ($result->num_rows > 0)
                   {
                        $row= $result->fetch_assoc(); 
                        echo $row['aver'];
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

