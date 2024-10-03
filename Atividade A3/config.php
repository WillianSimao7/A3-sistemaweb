<?php
$con = mysqli_connect('localhost', 'root','');
$db = mysqli_select_db($con, 'atividade');

if(!$con || !$db){
    echo "<pre>";
    echo mysql_error($con);
    echo "</pre>";
}
?>