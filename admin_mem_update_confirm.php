<?php
    #---데이터베이스에 연결---#
    session_start();
    include('db.php');

    $mem_id = $_POST['mem_id'];
    $mem_pass = $_POST['mem_pass'];
    $mem_email = $_POST['mem_email'];
    $mem_tel1 = $_POST['mem_tel1'];
    $mem_tel2 = $_POST['mem_tel2'];
    $mem_tel3 = $_POST['mem_tel3'];
    $mem_zip1 = $_POST['mem_zip1'];
    $mem_zip2 = $_POST['mem_zip2'];
    $mem_jumin1 = $_POST['mem_jumin1'];
    $mem_jumin2 = $_POST['mem_jumin2'];
    $mem_name = $_POST['mem_name'];
    $mem_address = $_POST['mem_address'];
    

    #---전화번호 형식에 맞게 만들기---#
    $mem_telephone = $mem_tel1 .$mem_tel2 .$mem_tel3;
   
    #---우편번호 형식에 맞게 만들기---#
    $mem_zip = $mem_zip1. "-" .$mem_zip2;

    #---주민번호 형식에 맞게 만들기---#
    $mem_jumin = $mem_jumin1 . $mem_jumin2;

    if(($mem_pass == "") || ($mem_id == "")){
        echo("
            <script>
                window.alert('아이디와 비밀번호를 다시 확인해주세요!');
                history.go(-1);
            </script>
        ");
        exit;
    }
    else{
        $query = "UPDATE member_tab set mem_email = '$mem_email', mem_password = '$mem_pass', 
        mem_name = '$mem_name', mem_jumin = '$mem_jumin', mem_address = '$mem_address', mem_zipcode = '$mem_zip', mem_telephone = '$mem_telephone' where mem_id = '$mem_id'";
        
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
                alert('회원정보 수정이 완료되었습니다!'); location.href='./index.html';
            </script>
        ");
    }
?>