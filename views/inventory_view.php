<html>
    <body>
    <table>
        <tr class="column-labels">
            <th>Item Name</th>
            <th>Status</th>
            <th>Image</th>
        </tr>
        <?php 
            foreach ($items as $item) {
                echo '<tr class=available-' . $item['isAvailable'] . '><td>' . $item['item_name'] . '</td><td>' . $item['status'] . '</td><td><img src=' . $item['img_path'] .' /></td></tr>';
            }
        ?>
    </table>
    </body>
</html>