<?php 
    require_once("dbconnect.php");
    $sql = "SELECT * FROM logs ORDER BY id DESC";
    if ($result=mysqli_query($conn,$sql))
    {
      while ($row=mysqli_fetch_row($result))
      {
        $nhietdo=$row[1];
        $doam=$row[2];
        $data2 = $doam;
    // Trả về dữ liệu
    echo $data2;
      }
      mysqli_free_result($result);
    }
    mysqli_close($conn);
    
    
?>