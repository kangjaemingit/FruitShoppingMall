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
    <?php
        $mem_id = $_GET['mem_id'];

        $query = "select * from member_tab where mem_id = '$mem_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $mem_name = $row['mem_name'];
        $mem_pass = $row['mem_password'];
        $mem_email = $row['mem_email'];
        $mem_address = $row['mem_address'];
        
        $mem_zip1 = substr($row['mem_zipcode'],0,3);
        $mem_zip2 = substr($row['mem_zipcode'],4,3);

        $mem_jumin1 = substr($row['mem_jumin'],0,6);
        $mem_jumin2 = substr($row['mem_jumin'],6,7);

        $mem_tel1 = substr($row['mem_telephone'],0,3);
        $mem_tel2 = substr($row['mem_telephone'],3,4);
        $mem_tel3 = substr($row['mem_telephone'],7,4);
    ?>


    <form method = "post" action = "admin_mem_update_confirm.php">;
        <h2 style ="background-color:lightgray; text-align : center;">회원정보수정</h2>
        <div class="input-group mb-3">
            <label for="mem_id">아이디 </label>
            <input type="id" class="form-control" name = "mem_id" id="mem_id" placeholder="Enter ID" value = '<?php echo $mem_id;?>'>
        </div>
        <div class="input-group mb-3">
            <label for="mem_pass">비밀번호 </label>
            <input
                type="text"
                class="form-control"
                name = "mem_pass"
                id="mem_pass"
                placeholder="Enter Password"
                value = '<?php echo $mem_pass?>'>
        </div>
        <div class="input-group mb-3">
            <label for="mem_email">이메일주소 </label>
            <input type="email" class="form-control" name = "mem_email" id="mem_email" placeholder="Enter Email" value = '<?php echo $mem_email;?>'> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_name">이름 </label>
            <input type="name" class="form-control" name = "mem_name" id="mem_name" placeholder="Enter Name" value = '<?php echo $mem_name;?>'> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_jumin1 mem_jumin2">주민등록번호 </label>
            <input type="text" class="form-control" id="mem_jumin1" name = "mem_jumin1" placeholder="주민등록번호1" value = '<?php echo $mem_jumin1;?>'>
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_jumin2" name = "mem_jumin2" placeholder="주민등록번호2" value = '<?php echo $mem_jumin2;?>'> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_zip1 mem_zip2">우편번호 </label>
            <input type="text" class="form-control" id="mem_zip1" name = "mem_zip1" placeholder="우편번호1" value = '<?php echo $mem_zip1;?>'>
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_zip2" name = "mem_zip2" placeholder="우편번호2" value = '<?php echo $mem_zip2;?>'> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_address">주소 </label>
            <input type="address" class="form-control" id="mem_address" name = "mem_address" placeholder="주소" value = '<?php echo $mem_address;?>'>
        </div>
        <div class="input-group mb-3">
            <label for="mem_tel1 mem_tel2 mem_tel3">전화번호 </label>
            <input type="text" class="form-control" id="mem_tel1" name = mem_tel1 placeholder="ex)010" value = '<?php echo $mem_tel1;?>'>
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_tel2" name = mem_tel2 placeholder="ex)1234" value = '<?php echo $mem_tel2;?>'> 
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_tel3" name = mem_tel3 placeholder="ex)5678" value = '<?php echo $mem_tel3;?>'>
        </div>
        
        <br>
        <div class = "d-grid gap-2 col-2 mx-auto">
            <button type="submit" class="btn btn-primary">수정 완료</button>
            <button type="reset" class="btn btn-primary">다시쓰기</button>
        </div>
        
        
    </form>
</body>
</html>