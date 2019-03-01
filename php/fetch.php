<?php
require_once('dbconfig.php');
$form_data=json_decode(file_get_contents("php://input"));
/*file_get_contents , which I though was only used to retrieve content from local files or traditional URLs, allows you to use the special php://input address to retrieve JSON data as a string. From there you use json_decode to turn the JSON string into a workable object/array.*/
$query="";
$data=array();

if(isset($form_data->search_query))
{
  $search_query=$form_data->search_query;
  $query="
    SELECT * FROM stuinfo_detail 
    WHERE (id LIKE '%$search_query%' 
    OR name LIKE '%$search_query%' 
    OR email LIKE '%$search_query%' 
    OR mblno LIKE '%$search_query%' ) 
    OR sub_name = '$search_query'
  ";
}else{
 $query = "SELECT * FROM stuinfo_detail ORDER BY name ASC";
}

$result = mysqli_query($con,$query);

//The mysqli_fetch_assoc() function fetches a result row as an associative array.
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }

    echo $json_response = json_encode($data);

?>