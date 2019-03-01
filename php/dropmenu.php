<?php
    require_once('dbconfig.php');
    $sql="select sub_name,sub_id from sub_tbl";
    $data = array();
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($result)){
 	  //echo "<option>".$row['sub_name']."</option>";
 	   $data[] = array("sub_id"=>$row['sub_id'],"sub_name"=>$row['sub_name']);
        }
        echo json_encode($data);
?>