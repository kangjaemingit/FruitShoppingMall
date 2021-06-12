<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>과일나라</title>
    <?php
        include('header.php');
        include('db.php');
    ?>
</head>
<body>
    <h4 style ="background-color:lightgray; text-align : center;">관리자 구매관리</h4>
    
    <!--검색창-->
    <form style = "margin-left : 30%; margin-right : 30%; margin-top : 30px;" name = "search_form" action = "admin_buy.php" method = "post">
        <div class="input-group mb-3">
            <select class="form-select-sm" id="buy_search_item" name="buy_search_item" >
                <option value="mem_id">아이디</option>
                <option value="goods_name">상품명</option>
                <option value="buy_date">날짜</option>
                <option value="buy_state">진행사항</option>
            </select>
            <input type="text" class="form-control" aria-label="Text input with dropdown button" id = "buy_search_text" name = "buy_search_text">
            <button class="btn btn-outline-secondary" type="submit">검색</button>
        </div>
    </form>

    <!--검색로직-->
    <?php
        if(isset($_POST['buy_search_text'])){
            $buy_search_item = $_POST['buy_search_item'];
            $buy_search_text = $_POST['buy_search_text'];
            $query = "select * from buy_tab where $buy_search_item like '%$buy_search_text%' order by buy_id";
        }
        else{
            $query = "select * from buy_tab";
        }

        $result = mysqli_query($conn, $query);
    ?>

    <!--구매관리 리스트-->
    <table class="table" style = "width:60%; margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
        <th scope="col" style = "width : 5%;">번호</th>
        <th scope="col">날짜</th>
        <th scope="col">아이디</th>
        <th scope="col">상품명</th>
        <th scope="col">가격</th>
        <th scope="col">수량</th>
        <th scope="col">소계</th>
        <th scope="col">진행사항</th>
        <th scope="col">처리</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($result){
                $sum = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $sum = $sum + ($row['buy_price'] * $row['buy_num']);
        ?>
                <tr>
                    <th scope="row"><?php echo $row['buy_id'];?></th>
                    <td><?php echo $row['buy_date'];?></td>
                    <td><?php echo $row['mem_id'];?></td>
                    <td><?php echo $row['goods_name'];?></td>
                    <td><?php echo $row['buy_price'];?> 원</td>
                    <td><?php echo $row['buy_num'];?> 개</td>
                    <td><?php echo $row['buy_price'] * $row['buy_num'];?> 원</td>
                    <form name = "state_update_form" method = "post" action = "admin_buy_update.php">
                        <td>
                            <select class="form-select-sm" id="update_state" name="update_state">
                                <option selected value = "<?php echo $row['buy_state'];?>"><?php echo $row['buy_state'];?></option>
                                <option value="구매요청">구매요청</option>
                                <option value="처리중">처리중</option>
                                <option value="배송중">배송중</option>
                                <option value="배송완료">배송완료</option>
                                <option value="구매취소">구매취소</option>
                            </select>
                        </td>
                        <td>
                            <input type = "hidden" name = "buy_id" id = "buy_id" value = "<?php echo $row['buy_id'];?>">
                            <button type="submit" class="btn btn-secondary btn-sm">수정</button>
                        </td>
                    </form>
                    
                </tr>
            <?php }}?>
            <tr>
                <th scope="row"></th>
                <td><b>총 합계 금액</b></td>
                <td></td><td></td><td></td><td></td>
                <td><b><?php echo $sum;?>원</b></td>
                <td></td>
            </tr>
    </tbody>
    </table>
</body>
</html>