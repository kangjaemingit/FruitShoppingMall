<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include('header.php');
        include('db.php');
    ?>
    <title>과일나라</title>
</head>
<body>
<h4 style ="background-color:lightgray; text-align : center;">회원관리</h4>
    
    <!--검색창-->
    <form style = "margin-left : 30%; margin-right : 30%; margin-top : 30px;" name = "search_form" action = "admin_mem_manage.php" method = "post">
        <div class="input-group mb-3">
            <select class="form-select-sm" id="mem_search_item" name="mem_search_item" >
                <option value="mem_id">아이디</option>
                <option value="mem_name">이름</option>
            </select>
            <input type="text" class="form-control" aria-label="Text input with dropdown button" id = "mem_search_text" name = "mem_search_text">
            <button class="btn btn-outline-secondary" type="submit">검색</button>
        </div>
    </form>

    <!--검색로직-->
    <?php
        if(isset($_POST['mem_search_text'])){
            $mem_search_item = $_POST['mem_search_item'];
            $mem_search_text = $_POST['mem_search_text'];
            $query = "select * from member_tab where $mem_search_item like '%$mem_search_text%' order by mem_id";
        }
        else{
            $query = "select * from member_tab";
        }

        $result = mysqli_query($conn, $query);
    ?>

    <!--회원 리스트-->
    <table class="table" style = "width:90%; margin-left: auto; margin-right: auto;">
    <thead>
        <tr>
        <th scope="col" style = "width : 10%;">아이디</th>
        <th scope="col">비밀번호</th>
        <th scope="col">이름</th>
        <th scope="col">전화번호</th>
        <th scope="col">이메일</th>
        <th scope="col">우편번호</th>
        <th scope="col">주소</th>
        <th scope="col">주민등록번호</th>
        <th scope="col">가입일</th>
        <th scope="col">회원정보수정</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            if($result){
                while($row = mysqli_fetch_assoc($result)){        
        ?>
                <tr>
                    <th scope="row"><?php echo $row['mem_id'];?></th>
                    <td><?php echo $row['mem_password'];?></td>
                    <td><?php echo $row['mem_name'];?></td>
                    <td><?php echo $row['mem_telephone'];?></td>
                    <td><?php echo $row['mem_email'];?></td>
                    <td><?php echo $row['mem_zipcode'];?></td>
                    <td><?php echo $row['mem_address'];?></td>
                    <td><?php echo substr($row['mem_jumin'],0,6);?> - <?php echo substr($row['mem_jumin'],6,7);?></td>
                    <td><?php echo $row['mem_date'];?></td>
                    <td><a href="admin_mem_update.php?mem_id=<?php echo $row['mem_id'];?>" class="btn btn-secondary btn-sm">수정</a></td>
                </tr>
            <?php }}?>
            
    </tbody>
    </table>
</body>
</html>