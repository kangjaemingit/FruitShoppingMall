<?php
    session_start();
    include('db.php');

    $goods_id = $_POST['goods_id'];
    $goods_code = $_POST['goods_code'];
    $goods_name = $_POST['goods_name'];
    $goods_country = $_POST['goods_country'];
    $goods_price = $_POST['goods_price'];
    $goods_image = $_FILES['goods_image']['name'];
    $goods_explain = $_POST['goods_explain'];

    #--날짜 재지정--#
    $goods_date = date('Y-m-d', time());

    if(trim($goods_image) == ""){
        $query = "UPDATE goods_tab SET goods_code = '$goods_code', goods_name = '$goods_name', 
        goods_country = '$goods_country', goods_price = '$goods_price', goods_explain = '$goods_explain', goods_date = '$goods_date' where goods_id = '$goods_id'";

        $result = mysqli_query($conn, $query);
    }
    else{
        $image_root = './image/';
        $upload_file = $image_root. basename($goods_image);
        $query = "select goods_image from goods_tab where goods_id = '$goods_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        
        if($row['goods_image'] != ""){
            if(file_exists("./image/".$row['goods_image'])){
                if(!unlink("./image/".$row['goods_image'])){
                    echo "기존 사진 삭제 실패";
                }
            }
        }
        
        if($goods_image){
            if(file_exists("./image/".$row['goods_image'])){
                echo("이미 존재하는 파일");
            }
            else if(($_FILES['goods_image']['error'] > 0) || ($_FILES['goods_image']['size'] <= 0)){ 
                echo "파일 업로드에 실패하였습니다."; 
            } 
            else { 
                if(!is_uploaded_file($_FILES['goods_image']['tmp_name'])) { 
                      echo "HTTP로 전송된 파일이 아닙니다."; 
                } 
                else { 
                    if (move_uploaded_file($_FILES['goods_image']['tmp_name'], $upload_file)) { 
                        echo "성공적으로 업로드 되었습니다.\n";
                        $query = "UPDATE goods_tab SET goods_code = '$goods_code', goods_name = '$goods_name',
                            goods_country = '$goods_country', goods_price = '$goods_price', goods_explain = '$goods_explain', goods_date = '$goods_date', 
                            goods_image = '$goods_image' where goods_id = '$goods_id'";
                        $result = mysqli_query($conn, $query);
                    } 
                    else { 
                        echo "파일 업로드 실패입니다.\n"; 
                    }
                }
            } 
        }
    }

    
    if(!$result){
        echo "<script>window.alert('업데이트에 실패하였습니다.');</script>";
        exit;
    }
    else{
        echo("<script>alert('업데이트가 완료되었습니다!.'); location.href='./product_list.php';</script>");
    }
?>