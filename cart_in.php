<?php
    session_start();
    include('db.php');

    if(isset($_SESSION['shop_logon'])){
        $mem_id = $_SESSION['shop_logon'][0];
        $goods_id = $_GET['goods_id'];

        $query = "select * from cart_tab where mem_id = '$mem_id' and goods_id = '$goods_id'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_fetch_assoc($result);

        if($rows['carts_id'] != ""){
            $carts_amount = $rows['carts_amount'];
            $carts_amount++;
            $query = "UPDATE cart_tab SET carts_amount = '$carts_amount' where goods_id = '$goods_id'";
            $result = mysqli_query($conn, $query);

            if(!$result){
                echo "<script>window.alert('장바구니 담기에 실패했습니다(수량증가).');</script>";
                exit;
            }
            else{
                echo "<script>window.alert('이미 장바구니에 있는 상품입니다! 수량을 증가시킵니다.'); location.href='./cart.php';</script>";
                exit;
            }
        }
        else{
            $query = "insert into cart_tab(mem_id, goods_id, carts_amount) values ('$mem_id', '$goods_id', 1)";
            $result = mysqli_query($conn, $query);

            if(!$result){
                echo "<script>window.alert('장바구니 담기에 실패했습니다.(새로만들기).');</script>";
                exit;
            }
            else{
                echo "<script>window.alert('장바구니에 성공적으로 담겼습니다!'); location.href='./cart.php';</script>";
                exit;
            }

        }
    }
    else{
        echo "<script>window.alert('장바구니에 담기 기능은 회원만 이용할 수 있습니다!'); location.href='./product_list.php';</script>";
        exit;
    }
?>