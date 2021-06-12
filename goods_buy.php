<?php
    session_start();

    include('db.php');

    if(isset($_SESSION['shop_logon'])){
        $buy_date = date('Y-m-d', time());
        $buy_state = '구매요청';
        $mem_id = $_SESSION['shop_logon'][0];
        
        # 장바구니에서 구매요청을 한 경우
        if(isset($_GET['carts_id'])){
            $carts_id = $_GET['carts_id'];
            $query_cart = "select * from cart_tab where carts_id = '$carts_id'";
            $result_cart = mysqli_query($conn, $query_cart);
            $row_cart = mysqli_fetch_assoc($result_cart);
            $goods_id = $row_cart['goods_id'];

            $query_goods = "select goods_name, goods_price from goods_tab where goods_id = '$goods_id'";
            $result_goods = mysqli_query($conn, $query_goods);
            $row_goods = mysqli_fetch_assoc($result_goods);

            $goods_price = $row_goods['goods_price'];
            $carts_amount = $row_cart['carts_amount'];
            $goods_name = $row_goods['goods_name'];

            $query = "insert into buy_tab(goods_id, mem_id, buy_price, buy_state, buy_date, buy_num, goods_name) values ('$goods_id', '$mem_id', '$goods_price', 
            '$buy_state', '$buy_date', '$carts_amount', '$goods_name')";
            $result = mysqli_query($conn, $query);
        }
        # 상세보기에서 구매요청을 한 경우
        else{
            $goods_id = $_GET['goods_id'];

            $query_goods = "select goods_name, goods_price from goods_tab where goods_id = '$goods_id'";
            $result_goods = mysqli_query($conn, $query_goods);
            $row_goods = mysqli_fetch_assoc($result_goods);

            $goods_price = $row_goods['goods_price'];
            $goods_name = $row_goods['goods_name'];

            $query = "insert into buy_tab(goods_id, mem_id, buy_price, buy_state, buy_date, buy_num, goods_name) values ('$goods_id', '$mem_id', '$goods_price', 
            '$buy_state', '$buy_date', 1, '$goods_name')";
            $result = mysqli_query($conn, $query);
        }

        if(!$result){
            echo "
            <script>
                window.alert('구매신청에 실패했습니다.');
                history.go(-1);
            </script>";
            exit;
        }
        else{
            echo("<script>alert('구매요청에 성공했습니다!'); location.href='./product_list.php';</script>");
        }
    }
?>