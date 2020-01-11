<?php 
    
    function update_announce($order_id){
        $conn = mysqli_connect('localhost', 'root', '', 'project');
        $sql = "UPDATE tbl_orders SET note = 1 WHERE order_id = {$order_id}";
        mysqli_query($conn, $sql);
    }
    
?>