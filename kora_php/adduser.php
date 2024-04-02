<?php 
require 'function.php';
?>
<html>
    <body>
        <form class=""action="" method="post" enctype="multipart/form-data">
            Category:
             <input type="text" name="category"  required>
             <br>
             <br>
            Name:
            <input type="text" name="name"  required>
            <br>
            <br>   
            Image:
            <input type="file" name="file"  required>
            <br>
            <br>
            Price:
            <input type="text" name="price"  required>
            <br>
            <br>
            <button type="submit" name="submit" value="add">Add</button>
        </form>
        <br>
        <a href="index.php">Index Page</a>
    </body>
</html>