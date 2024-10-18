<?php
ob_start();
                require_once("dbconnect.php");
                $sql = "SELECT thietbi FROM db_iot where trangthai = 1";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
				    echo implode (" ",$row).";";
                }
                }
                if(isset($_POST['home'])){
					header('Location: dashboard.php');

                };
				if(isset($_POST['reresh'])){
					header('Location: display.php');

                };
                
                if(!empty($_POST['doam']) && !empty($_POST['nhietdo']))
                {	
    	            $nhietdo = $_POST['nhietdo'];
                    $doam = $_POST['doam'];
             	    $sql = "UPDATE `logs` SET `nhietdo`='".$nhietdo."',`doam`='".$doam."' WHERE id='1'";
		
	        	    if ($conn->query($sql) === TRUE) {
                        echo "OK";
                        echo "$nhietdo";
		            } else {
		               echo "Error: " . $sql . "<br>" . $conn->error;
		            }
	            };
	                $conn->close();
				ob_end_flush();
            ?>
<!doctype html>
	<head>
	    <meta http-equiv="refresh" content="5">
		<title>Data</title>
	</head>
</html> 