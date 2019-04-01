<?php
    include("config.php");
?>
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
        <a href="index.php" id="nostylelink"><div id="titlebar">
            Watauga Humane Society Database
        </div></a>
                <br/>
                <form method="post" action="updateValue.php">
                    Attribute: <br/>
                <?php
                
                echo "<input type=\"hidden\" name = \"ID\" value = \"" . $_POST['ID']. "\">";
                echo "<input type=\"hidden\" name = \"TID\" value = \"" . $_POST['TID']. "\">";
                echo "<input type=\"hidden\" name = \"Tname\" value = \"" . $_POST['Tname']. "\">";
                echo "<select name=\"dropdown\">";

                
                $columns = $_POST['columns'];
                foreach($columns as $col=>$value)
                 {
                    echo "<option value =\"" . $value. "\">" . $value . "</option>";
                 }

                ?>
                </select>
                <br/>
                Value: </br>
                <input type ="text" name="input" id="input">
                    <input type="submit" value="Submit">  
                </form>
            
                <div id="normal">
                <a href="index.php"><button>Back</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
