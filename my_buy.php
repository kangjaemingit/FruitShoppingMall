<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include('db.php');
        include('header.php');
        $mem_id = $_SESSION['shop_logon'][0];
    ?>
    <title>과일나라</title>
</head>
<body>
    <h4 style ="background-color:lightgray; text-align : center;">내 구매 관리</h4>
    <br/><br/>

    <!--구매진행중인상품 리스트-->
    <h5 style ="text-align : center">구매진행중인 상품</h5>
    <table class="table" style = "width:60%; margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
        <th scope="col" style = "width : 20%;">날짜</th>
        <th scope="col">상품명</th>
        <th scope="col">가격</th>
        <th scope="col">수량</th>
        <th scope="col">소계</th>
        <th scope="col">진행사항</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "select * from buy_tab where mem_id = '$mem_id' and (buy_state = '구매요청' or buy_state = '배송중' or buy_state = '처리중')";
            $result = mysqli_query($conn, $query);

            if($result){
                $sum = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $sum = $sum + ($row['buy_price'] * $row['buy_num']);
        ?>
                <tr>
                    <th scope="row"><?php echo $row['buy_date'];?></th>
                    <td><?php echo $row['goods_name'];?></td>
                    <td><?php echo $row['buy_price'];?>원</td>
                    <td><?php echo $row['buy_num'];?>개</td>
                    <td><?php echo $row['buy_price'] * $row['buy_num'];?>원</td>
                    <td><?php echo $row['buy_state'];?></td>
                </tr>
            <?php }}?>
            <tr>
                <th scope="row"><b>총 합계 금액</b></th>
                <td></td>
                <td></td>
                <td></td>
                <td><b><?php echo $sum;?>원</b></td>
                <td></td>
            </tr>
    </tbody>
    </table>
    <br/><br/>

    <!--지난 구매 내역 상품 리스트-->
    <h5 style ="text-align : center">지난 구매 내역</h5>
    <table class="table" style = "width:60%; margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
        <th scope="col" style = "width : 20%;">날짜</th>
        <th scope="col">상품명</th>
        <th scope="col">가격</th>
        <th scope="col">수량</th>
        <th scope="col">소계</th>
        <th scope="col">진행사항</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $query = "select * from buy_tab where mem_id = '$mem_id' and (buy_state = '배송완료' or buy_state = '구매취소')";
            $result = mysqli_query($conn, $query);

            if($result){
                $sum = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $sum = $sum + ($row['buy_price'] * $row['buy_num']);
        ?>
                <tr>
                    <th scope="row"><?php echo $row['buy_date'];?></th>
                    <td><?php echo $row['goods_name'];?></td>
                    <td><?php echo $row['buy_price'];?>원</td>
                    <td><?php echo $row['buy_num'];?>개</td>
                    <td><?php echo $row['buy_price'] * $row['buy_num'];?>원</td>
                    <td><?php echo $row['buy_state'];?></td>
                </tr>
            <?php }}?>
            <tr>
                <th scope="row"><b>총 합계 금액</b></th>
                <td></td>
                <td></td>
                <td></td>
                <td><b><?php echo $sum;?>원</b></td>
                <td></td>
            </tr>
    </tbody>
    </table>
    
</body>
</html>