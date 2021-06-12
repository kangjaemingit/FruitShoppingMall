<?php
    session_start();
    include('db.php');

    $goods_code = $_POST['goods_code'];
    $goods_name = $_POST['goods_name'];
    $goods_country = $_POST['goods_country'];
    $goods_price = $_POST['goods_price'];
    $goods_image = $_FILES['goods_image']['name'];
    $goods_explain = $_POST['goods_explain'];

    #--날짜 지정--#
    $goods_date = date('Y-m-d', time());


    $image_root = './image/';
    $upload_file = $image_root. basename($goods_image);
    
    if($goods_image){
        if(($_FILES['goods_image']['error'] > 0) || ($_FILES['goods_image']['size'] <= 0)){ 
            echo "<script>window.alert('파일업로드 실패 에러발생');history.go(-1);</script>"; 
        } 
        else { 
            if(!is_uploaded_file($_FILES['goods_image']['tmp_name'])) { 
                    echo "<script>window.alert('HTTP로 전승된 파일이 아님!');history.go(-1);</script>"; 
            } 
            else { 
                if (move_uploaded_file($_FILES['goods_image']['tmp_name'], $upload_file)) { 
                    $query = "insert into goods_tab(goods_code, goods_name, goods_country, goods_price, goods_explain, goods_date, goods_image) 
                    values('$goods_code', '$goods_name', '$goods_country', '$goods_price', '$goods_explain', '$goods_date', '$goods_image')";
                    $result = mysqli_query($conn, $query);
                } 
                else { 
                    echo "<script>window.alert('파일 업로드 실패');history.go(-1);</script>"; 
                }
            }
        } 
    }


    if(!$result){
        echo "
        <script>
            window.alert('상품등록에 실패하였습니다.');
            history.go(-1);
        </script>";
        exit;
    }
    else{
        echo("<script>alert('상품등록이 완료되었습니다!.'); location.href='./product_list.php';</script>");
    }
?>