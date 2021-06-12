<?php
    #---데이터베이스에 연결---#
    $conn = mysqli_connect('localhost', 'root', 'root');

    $db_status = mysqli_select_db($conn,'shoppingmall');
    if(!$db_status){
        echo("<script>console.log('dberror')</script>");
        exit;
    }
    else{
        echo("<script>console.log('connect_successfully')</script>");
    }
?>