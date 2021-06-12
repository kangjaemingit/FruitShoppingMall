<?php
    session_start();
    include('db.php');

    $goods_id = $_GET['goods_id'];

    $query = "select goods_image from goods_tab where goods_id = '$goods_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    
    if($row['goods_image'] != ""){
        if(file_exists("./image/".$row['goods_image'])){
            if(!unlink("./image/".$row['goods_image'])){
                echo("
                    <script>
                        window.alert('사진을 삭제하는데 실패했습니다.');
                        history.go(-1);
                    </script>
                ");
            }
        }
    }

    $query = "delete from goods_tab where goods_id = '$goods_id'";
    $result = mysqli_query($conn, $query);

    if(!$result){
        echo("
            <script>
                window.alert('데이터 삭제 실패');
                history.go(-1);
            </script>
        ");
    }
    else{
        echo("
            <script>
                alert('데이터 삭제가 완료되었습니다.'); location.href='./product_list.php';
            </script>
        ");
    }

    

?>