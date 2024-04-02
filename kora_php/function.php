<?php
$conn = mysqli_connect("localhost", "root", "", "kora");

if (isset($_POST["submit"])){
    if($_POST["submit"] == "add"){
        add();
    }
    elseif($_POST["submit"] == "edit"){
       edit(); 
    }
    else{
        delete();
    }
}
function add(){
    global $conn;

    $category= $_POST['category'];
    $name = $_POST['name'];
    $filename= $_FILES['file']['name'];
    $tmpName= $_FILES['file']['tmp_name'];

    $newfilename = uniqid()."-".$filename;
    
    move_uploaded_file($tmpName, "uploads/". $newfilename);
    $Price= $_POST['price'];
    $query = "INSERT INTO products VALUES('', '$category', '$name', '$newfilename' , '$Price')";
    mysqli_query($conn, $query);

    echo
    "
    <script> alert('Image added successfully'); document.location.href = 'index.php';</script>
    ";   
}
function edit(){
    global $conn;

    $id= $_GET['id'];
    $category= $_POST['category'];
    $name = $_POST['name'];
    $Price= $_POST['price'];

    if($_FILES["file"]["error"] != 4){
        $filename= $_FILES['file']['name'];
        $tmpName= $_FILES['file']['tmp_name'];

        $newfilename = uniqid()."-".$filename;

        move_uploaded_file($tmpName, "uploads/". $newfilename);
        $query = "UPDATE products SET image = '$newfilename' WHERE id = $id";
        mysqli_query($conn, $query);

    }
    $query = "UPDATE products SET name = '$name' WHERE id = $id";
    mysqli_query($conn, $query);
    echo
    "
    <script> alert('Image updated successfully'); document.location.href = 'index.php';</script>
    ";
}
function delete(){
global $conn;

$id = $_POST['submit'];

$query = "DELETE FROM products WHERE id = $id";
mysqli_query($conn, $query);

echo

"
<script> alert('Image deleted successfully'); </script>
";
}
?>