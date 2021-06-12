<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
            crossorigin="anonymous">
        <?php include('header.php'); ?>
        <title>과일나라</title>
        
    </head>
    <body>
        <h2 style ="background-color:lightgray; text-align : center;">과일나라 로그인</h2>
        <form method = "post" action = "login_ok.php">
            <div class="form-group">
                <label for="mem_id">아이디</label>
                <input type="id" class="form-control" name = "mem_id" id="mem_id" placeholder="Enter ID"> 
            </div>
            <div class="form-group">
                <label for="mem_pw">비밀번호</label>
                <input
                    type="password"
                    class="form-control"
                    id="mem_pw"
                    name = "mem_pw"
                    placeholder="Enter Password">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">로그인</button>
            <a href="./new_init.php" role="button" class="btn btn-primary">회원가입</a>
        </form>


    </body>
</html>