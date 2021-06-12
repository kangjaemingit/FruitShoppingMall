<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include('header.php'); ?>
    <title>과일나라 회원가입</title>
</head>
<body>
    <form method = "post" action = "new_confirm.php">;
        <h2 style ="background-color:lightgray; text-align : center;">과일나라 회원가입</h2>
        <div class="input-group mb-3">
            <label for="mem_id">아이디 </label>
            <input type="id" class="form-control" name = "mem_id" id="mem_id" placeholder="Enter ID"> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_pass">비밀번호 </label>
            <input
                type="password"
                class="form-control"
                name = "mem_pass"
                id="mem_pass"
                placeholder="Enter Password">
        </div>
        <div class="input-group mb-3">
            <label for="mem_pass2">비밀번호 학인 </label>
            <input
                type="password"
                class="form-control"
                id="mem_pass2"
                name = "mem_pass2"
                placeholder="Enter Password">
        </div>
        <div class="input-group mb-3">
            <label for="mem_email">이메일주소 </label>
            <input type="email" class="form-control" name = "mem_email" id="mem_email" placeholder="Enter Email"> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_name">이름 </label>
            <input type="name" class="form-control" name = "mem_name" id="mem_name" placeholder="Enter Name"> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_jumin1 mem_jumin2">주민등록번호 </label>
            <input type="text" class="form-control" id="mem_jumin1" name = "mem_jumin1" placeholder="주민등록번호1">
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_jumin2" name = "mem_jumin2" placeholder="주민등록번호2"> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_zip1 mem_zip2">우편번호 </label>
            <input type="text" class="form-control" id="mem_zip1" name = "mem_zip1" placeholder="우편번호1">
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_zip2" name = "mem_zip2" placeholder="우편번호2"> 
        </div>
        <div class="input-group mb-3">
            <label for="mem_address">주소 </label>
            <input type="address" class="form-control" id="mem_address" name = "mem_address" placeholder="주소">
        </div>
        <div class="input-group mb-3">
            <label for="mem_tel1 mem_tel2 mem_tel3">전화번호 </label>
            <input type="text" class="form-control" id="mem_tel1" name = mem_tel1 placeholder="ex)010">
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_tel2" name = mem_tel2 placeholder="ex)1234"> 
            <span class = "input-group-text"> - </span>
            <input type="text" class="form-control" id="mem_tel3" name = mem_tel3 placeholder="ex)5678">
            <input type = "hidden" name = "pass" id = "pass" value = "ok">
        </div>
        
        <br>
        <div class = "d-grid gap-2 col-2 mx-auto">
            <button type="submit" class="btn btn-primary">회원가입 완료</button>
            <button type="reset" class="btn btn-primary">다시쓰기</button>
        </div>
        
        
    </form>
</body>
</html>