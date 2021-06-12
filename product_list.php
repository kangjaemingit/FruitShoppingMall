
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <?php 
            include('header.php');
            include('db.php');
        ?>
        <title>과일나라</title>
    </head>
    <body>
    
        <form style = "margin-left : 30%; margin-right : 30%; margin-top : 30px;" name = "search_form" action = "product_list.php" method = "post">
            <div class="input-group mb-3">
                <select class="form-select-sm" id="search_item" name="search_item" >
                    <option value="goods_name">제품명</option>
                    <option value="goods_country">원산지</option>
                </select>
                <input type="text" class="form-control" aria-label="Text input with dropdown button" id = "search_text" name = "search_text">
                <button class="btn btn-outline-secondary" type="submit">검색</button>
            </div>
        </form>

        <!--검색로직-->
        <?php
            if(isset($_POST['search_text'])){
                $search_item = $_POST['search_item'];
                $search_text = $_POST['search_text'];
                $query = "select goods_id, goods_name, goods_image, goods_price, goods_country from goods_tab where $search_item like '%$search_text%' order by goods_id";
            }
            else{
                $query = "select goods_id, goods_name, goods_image, goods_price, goods_country from goods_tab order by goods_id";
            }

            $result = mysqli_query($conn, $query);
        ?>
        
        <div class="container" style ="margin-top : 50px;">
            <div class="row">
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <div class="col-3">
                        <div class="card h-100">
                            <div class="card-header">
                                상품정보
                            </div>
                            <img src="./image/<?php echo $row['goods_image']; ?>"/>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['goods_name'];?></h5>
                                <p class="card-text">가격 : <?php echo $row['goods_price'];?>원</p>
                                <p class="card-text">원산지 : <?php echo $row['goods_country'];?></p>
                                <a href="detail.php?goods_id=<?php echo $row['goods_id'];?>" class="btn btn-primary btn-sm">상세보기</a>
                                <a href="cart_in.php?goods_id=<?php echo $row['goods_id'];?>" class="btn btn-primary btn-sm">담기</a>
                                <?php
                                    if(isset($_SESSION['shop_logon'])){
                                        if($shop_logon[0] == "admin"){
                                ?>
                                    <a href="goods_update.php?goods_id=<?php echo $row['goods_id'];?>" class="btn btn-secondary btn-sm">수정</a>
                                    <a href="goods_delete.php?goods_id=<?php echo $row['goods_id'];?>" class="btn btn-secondary btn-sm">삭제</a>
                                <?php }}?>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>


        
    </body>
</html>