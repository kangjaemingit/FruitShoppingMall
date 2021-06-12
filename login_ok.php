<meta charset = "utf-8"/>
<?php
    session_start();

    include('db.php');

 $mem_id = $_POST['mem_id'];
 $mem_pass = $_POST['mem_pw'];

 #----DB에 등록된 회원인지 확인----#
 $query = "select mem_id, mem_name from member_tab where (mem_id = '$mem_id') and (mem_password = '$mem_pass')";
 $result = mysqli_query($conn, $query);

 $row = $result->fetch_array();

 if($row[0] == ""){
     echo("
         <script>
             window.alert('아이디와 비밀번호를 확인해주세요');
             history.go(-1);
         </script>
     ");
     exit;
 }
 else{
     #----세션이 설정되지 않았으면 설정함----#
     if(!isset($_SESSION['shop_logon'])){
        $shop_logon = array($row[0], $row[1]);
        $_SESSION['shop_logon'] = $shop_logon;
        $_SESSION['mem_id'] = $row[0];
         
     }
     echo("
         <script>alert('로그인되었습니다.'); location.href='./index.html';</script>
     ");
 }
?>