<?php

include('../config.php');
function getAllItems($table)
{
    global $link;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($link, $query);
}

?>