<?php
    $id = (int) $_GET['id'];
    delete_users($id);
    redirect("?mod=users&action=show");
?>