<html>
    <head>
        <link rel="stylesheet" href="../styles/global.css">
        <link rel="stylesheet" href="../styles/inventory_style.css">
    </head>
    <body>
        <nav class="navbar">
            <ul class="unorderedList">
                <li class="listItem"><a href="./inventory_list.php">Home</a></li>
                <li class="listItem"><a href="./login.php?action=logout">Logout</a></li>
            </ul>
        </nav>
        <h2>Current Inventory</h2>
        <table>
            <tr class="column-labels">
                <th>Item Name</th>
                <th>Status</th>
                <th>Image</th>
            </tr>
            <?php 
                foreach ($items as $item) {
                    echo '<tr class=available-' . $item['isAvailable'] . '><td><a href="./item_details.php?itemId=' . $item['item_id'] . '">' . $item['itemName'] . '</a></td><td>' . $item['status'] . '</td><td><img src="../images/' . $item['img_path'] .'" /></td></tr>';
                }
            ?>
        </table>
        <a href="./add_item.php">Add an item</a>
    </body>
</html>