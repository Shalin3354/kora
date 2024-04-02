<?php 
require 'function.php'; 
?>
<html>
    <body>
        <table border = 1 cellpadding = 10 cellspacing = 0>
            <tr>
                <td>#</td>
                <td>Name</td>
                <td>Category</td>
                <td>Image</td>
                <td>Price</td>
                <td>Action</td>
            </tr>
            <?php
            $users = mysqli_query($conn, "SELECT * FROM products");
            $i=1;

            foreach($users as $user) :
            ?>
        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $user["category"];?></td>
            <td><?php echo $user["name"];?></td>
            <td><img src="uploads/<?php echo $user["image"];?>" width="300px" height="300px"></td>
            <td><?php echo $user["price"];?></td>
            <td>
                <a href="edituser.php?id=<?php echo $user["id"];?>">Edit</a>
                <br>
                <br>
                <form  method="post">
                <button type="submit" name="submit" value="<?php echo $user["id"];?>">Delete</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        <br>
        <a href="adduser.php">Add User Page</a>
        <br>
        <br>
        </table>
    </body>
</html>