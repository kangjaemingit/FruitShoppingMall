<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('header.php');
        include('db.php');
        $mem_id = $_SESSION['shop_logon'][0];
    ?>
    <title>과일나라 장바구니</title>
</head>
<body>
    <?php
        $query = "select * from cart_tab where mem_id = '$mem_id'";
        $result = mysqli_query($conn, $query);
    ?>

    <h4 style ="background-color:lightgray; text-align : center;">장바구니</h4>
    <table class="table" style = "width:60%; margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
        <th scope="col" style = "width : 20%;">이름</th>
        <th scope="col">가격</th>
        <th scope="col">수량</th>
        <th scope="col">소계</th>
        <th scope="col">구매</th>
        <th scope="col">삭제</th>
        </tr>
    </thead>
    <tbody>
        <?php if($result){
            $sum = 0;
            while($row = mysqli_fetch_assoc($result)){
                $goods_id = $row['goods_id'];        
                $query2 = "select goods_name, goods_price from goods_tab where goods_id = '$goods_id'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_assoc($result2);
                $sum = $sum + ($row['carts_amount'] * $row2['goods_price']);
        ?>
            <tr>
                <th scope="row"><?php echo $row2['goods_name'];?></th>
                <td><?php echo $row2['goods_price'];?>원</td>
                <td><?php echo $row['carts_amount'];?>개</td>
                <td><?php echo $row['carts_amount'] * $row2['goods_price'];?>원</td>
                <td><a href="goods_buy.php?carts_id=<?php echo $row['carts_id'];?>" class="btn btn-secondary btn-sm">구매</a></td>
                <td><a href="cart_delete.php?carts_id=<?php echo $row['carts_id'];?>" class="btn btn-secondary btn-sm">삭제</a></td>
            </tr>
        <?php }}?>
        <tr>
            <th scope="row"><b>총 합계 금액</b></th>
            <td></td>
            <td></td>
            <td><b><?php echo $sum;?>원</b></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    </table>



</body>
</html>