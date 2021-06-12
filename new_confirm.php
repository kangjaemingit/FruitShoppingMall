<?php
    #---데이터베이스에 연결---#
    include('db.php');

    $mem_id = $_POST['mem_id'];
    $mem_pass = $_POST['mem_pass'];
    $mem_pass2 = $_POST['mem_pass2'];
    $mem_email = $_POST['mem_email'];
    $mem_tel1 = $_POST['mem_tel1'];
    $mem_tel2 = $_POST['mem_tel2'];
    $mem_tel3 = $_POST['mem_tel3'];
    $mem_zip1 = $_POST['mem_zip1'];
    $mem_zip2 = $_POST['mem_zip2'];
    $mem_name = $_POST['mem_name'];
    $mem_jumin1 = $_POST['mem_jumin1'];
    $mem_jumin2 = $_POST['mem_jumin2'];
    $mem_address = $_POST['mem_address'];
    

    #---전화번호 형식에 맞게 만들기---#
    $mem_telephone = $mem_tel1 .$mem_tel2 .$mem_tel3;
   
    #---우편번호 형식에 맞게 만들기---#
    $mem_zip = $mem_zip1. "-" .$mem_zip2;

    #---주민번호 형식에 맞게 만들기---#
    $mem_jumin = $mem_jumin1 . $mem_jumin2;

    #---현재날짜 형식에 맞게 만들기---#
    $mem_date = date('Y-m-d', time());

    

    #---새로운 멤버를 삽입하는 질의---#
    $query = "select mem_id from member_tab where mem_id = '$mem_id'";
    $result = mysqli_query($conn, $query);

    if($row = mysqli_fetch_assoc($result)){
        echo("
            <script>
                window.alert('이미 존재하는 아이디입니다!!');
                history.go(-1);
            </script>
        ");
        exit;
    }
    else if($mem_pass != $mem_pass2){
        echo("
            <script>
                window.alert('비밀번호를 다시 확인해주세요!');
                history.go(-1);
            </script>
        ");
        exit;
    }
    else{
        $query = "insert into member_tab VALUES ('$mem_id', '$mem_email', '$mem_pass', '$mem_name', '$mem_address', '$mem_zip', '$mem_telephone', '$mem_jumin', '$mem_date')";
        $result = mysqli_query($conn, $query);
    }

    


   

    #---질의가 제대로 되없는지 확인---#
    if(!$result){
        echo("
            <script>
                window.alert('다시한번 확인해 주세요');
                history.go(-1);
            </script>
        ");
        exit;
    }
    else{
        echo("
            <script>
                alert('회원가입이 완료되었습니다!'); location.href='./index.html';
            </script>
        ");
    }
?>