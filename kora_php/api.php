<?php
include_once("core.php");
$con = mysqli_connect("localhost", "root", "", "kora");
$response = array();
if($con)
{
    $params = (isset($_GET['params'])) ? json_decode(urldecode($_GET['params']), true) : [];
    $q = '';
    if(!empty($params['category'])) {
        $q .= "category = '" . $params['category'] . "'";
    }
    if(!empty($params['query'])) {
        $q .= ($q != '') ? ' AND ': '';
        $q .= "name LIKE '%" . strtolower($params['query']) . "%'";
    }
    $q = ($q != '') ? " WHERE " . $q : '';
    $sql = "SELECT * FROM products " . $q;
    $result = mysqli_query($con, $sql);

    if($result)
    {
        header("Content-Type: application: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['id'] = $row['id'];
            $response[$i]['category'] = $row['category'];
            $response[$i]['name'] = $row['name'];
            $response[$i]['image'] =$row['image'];
            $response[$i]['price'] = $row['price'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}
else
{
  echo "DB not connected";    
}
?>

