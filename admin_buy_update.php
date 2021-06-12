<?php
    session_start();
    include('db.php');

    $update_state = $_POST['update_state'];
    $buy_id = $_POST['buy_id'];

    $query = "UPDATE buy_tab set buy_state = '$update_state' where buy_id = '$buy_id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "
        <script>
            window.alert('진행상태 수정에 실패했습니다.');
            history.go(-1);
        </script>";
        exit;
    }
    else{
        echo("<script>alert('진행상태가 성공적으로 수정되었습니다.'); location.href='./admin_buy.php';</script>");
    }

?>