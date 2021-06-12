<?php
    include('db.php');

    $carts_id = $_GET['carts_id'];

    $query = "delete from cart_tab where carts_id = '$carts_id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo "
        <script>
            window.alert('삭제에 실패했습니다!');
            history.go(-1);
        </script>";
        exit;
    }
    else{
        echo("<script>alert('장바구니 상품 삭제에 성공했습니다!'); location.href='./cart.php';</script>");
    }
?>