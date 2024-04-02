<?php
require 'function.php';
$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM img WHERE id = $id));
?>
<html>
<body>
<form  method="post" enctype="multipart/form-data" >
             Category:
             <input type="text" name="category" value = "<?php echo $user['category']; ?>" required>
             <br>
             <br>
            Name:
            <input type="text" name="name" value = "<?php echo $user['name']; ?>" required>
            <br>
            <br>
            Image:
            <input type="file" name="file"  required>
            <br>
            <br>
            Price:
            <input type="text" name="price" value = "<?php echo $user['price']; ?>" required>
            <br>
            <button type="submit" name="submit" value="edit">Edit</button>
 </form>
        <br>
        <a href="index.php">Index Page</a>
</body>
</html>

