<?php
    $id = (int) $_GET['id'];
    delete_post($id);
    redirect("?mod=post&action=list");
?>