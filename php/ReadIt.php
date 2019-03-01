<?php

    require_once('dbconfig.php');
    
    $data = array();
    $query = "SELECT * FROM stuinfo_detail ORDER BY id ASC";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    echo $json_response = json_encode($data);
    
?>