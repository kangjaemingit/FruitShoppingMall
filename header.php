<?php session_start()?>

<!DOCTYPE HTML>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </head>

  <body>
    <?php if(isset($_SESSION['shop_logon'])){ 
      $shop_logon = $_SESSION['shop_logon'];?>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <a class="navbar-brand" href="./index.html">★FruitWorld★</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="./product_list.php">상점보기</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cart.php">장바구니보기</a>
          </li>
          <?php if($shop_logon[0] == "admin"){ ?>
            <li class="nav-item">
              <a class="nav-link" href="./add_goods.php">상품입력</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./admin_buy.php">구매관리</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./admin_mem_manage.php">회원관리</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./logout_ok.php">로그아웃</a>
            </li> 
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="./my_buy.php">내구매관리</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./update_member.php">내정보수정</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./logout_ok.php">로그아웃</a>
            </li>
          <?php } ?>
        </ul>
        <span class="navbar-text" style = "color : blue;">
          <?php echo $shop_logon[1]; ?> 님 환영합니다.
        </span>
      </div>
    </nav>
    <?php } else { ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./index.html">★FruitWorld★</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="./product_list.php">상점보기</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cart.php">장바구니보기</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./login.php">로그인하기</a>
          </li>
        </ul>
      </div>
      </nav>
    <?php } ?>


  </body>
</html>

