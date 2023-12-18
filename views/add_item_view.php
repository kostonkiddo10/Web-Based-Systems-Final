<html>
    <head>
        <link rel="stylesheet" href="../styles/global.css">
    </head>
    <body>
    <nav class="navbar">
            <ul>
                <li><a href="./inventory_list.php">Home</a></li>
                <li><a href="./login.php?action=logout">Logout</a></li>
            </ul>
        </nav>
        <form action="add_item.php" method="post" enctype="multipart/form-data">
            <label for="imgUpload">*OPTIONAL* Upload a picture of the item:</label>
            <input type="file" name="imgUpload" id="imgUpload">

            <label for="itemName">Item Name</label>
            <input type="text" name="itemName">

            <input type="submit" value="Add Item" name="addItem">
        </form>
        <?= $message ?>
    </body>
</html>