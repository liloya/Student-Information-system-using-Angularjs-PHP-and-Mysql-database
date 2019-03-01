<?php
    require_once('dbconfig.php');
	
    $_POST = json_decode(file_get_contents('php://input'), true);
    // var_dump($_POST);
    // exit();

    if (empty($_POST['id']))
        echo 'id empty';
        $id = $_POST['id'];

    if (empty($_POST['name']))
        echo 'name empty';
        $name = $_POST['name'];
  
    if (empty($_POST['email']))
        echo 'email empty';
        $email = $_POST['email'];

    if (empty($_POST['mblno']))
        echo 'contact empty';
        $mblno = $_POST['mblno']; 

    if (empty($_POST['sub_name']))
        echo 'subject name empty';
        $sub_name = $_POST['sub_name']; 
                      
 //echo ' sub_name'.$sub_name;
 //exit();

    $query = "UPDATE stuinfo_detail SET name='$name',email='$email',mblno='$mblno',sub_name='$sub_name' WHERE id='$id'";
    $result = mysqli_query($con,$query);
    $rows = mysqli_affected_rows($con);

    echo $json_response = json_encode($rows);
?>