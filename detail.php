<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>과일나라</title>
    <?php include('header.php');?>
</head>
<body>
    <?php 
        $goods_id = $_GET['goods_id'];

        include('db.php'); 
        $query = "select * from goods_tab where goods_id = '$goods_id'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
    ?>
    <div style = "margin-left: auto; margin-right: auto; display:block;">
        <h4 style ="background-color:lightgray; text-align : center;">제품 상세정보 페이지</h4>
    </div>
    

    <img src="./image/<?php echo $row['goods_image'];?> " style = "margin-left: auto; margin-right: auto; display: block;"/>

    <table class="table" style = "width:60%; margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
        <th scope="col" style = "width : 20%;">정보</th>
        <th scope="col">내용</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">상품명</th>
            <td><?php echo $row['goods_name'];?></td>
        </tr>
        <tr>
            <th scope="row">원산지</th>
            <td><?php echo $row['goods_country'];?></td>
        </tr>
        <tr>
            <th scope="row">가격</th>
            <td><?php echo $row['goods_price'];?>원</td>
        </tr>
        <tr>
            <th scope="row">등록일</th>
            <td><?php echo $row['goods_date'];?></td>
        </tr>
        <tr>
            <th scope="row">상세정보</th>
            <td><?php echo $row['goods_explain'];?></td>
        </tr>
    </tbody>
    </table>
    <div class = "d-grid gap-2 col-2 mx-auto">
        <a href="goods_buy.php?goods_id=<?php echo $row['goods_id'];?>" class="btn btn-secondary btn-sm">구매하기</a>
        <a href="cart_in.php?goods_id=<?php echo $row['goods_id'];?>" class="btn btn-secondary btn-sm">장바구니 담기</a>
    </div>
</body>
</html>