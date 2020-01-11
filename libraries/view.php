<?php
    function product_cat_view($id)
    {
        $conn = mysqli_connect('localhost', 'root', '', 'project');
        $sql = "UPDATE tbl_products SET pro_view = pro_view + 1 WHERE pro_id = {$id}";
        mysqli_query($conn, $sql);
    }

?>