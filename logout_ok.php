<?php
    session_start();
    #----로그인되었는지 비교----#

    session_destroy();
    echo("<script> alert('로그아웃되었습니다.'); location.href='./index.html'; </script>");
?>