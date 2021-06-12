
<!DOCTYPE html>
        <html lang="ko">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>과일나라</title>
            <?php 
                include('header.php');
                include('db.php');
            ?>
        </head>
        <body>
            <h4 style ="background-color:lightgray; text-align : center;">상품 등록</h4>
                <form action = add_goods_ok.php method = post ENCTYPE = 'multipart/form-data'>
                    <div class="input-group mb-3">
                        <span class="input-group-text">상품코드</span>
                        <input type="text" class="form-control" name = "goods_code">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">상품명</span>
                        <input type="text" class="form-control" name = "goods_name" >
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">원산지</span>
                        <input type="text" class="form-control" name = "goods_country">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">가격</span>
                        <input type="text" class="form-control" name = "goods_price">
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="goods_image" name = "goods_image">
                        <label class="input-group-text" for="goods_image">이미지 파일</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">상세설명</span>
                        <textarea class="form-control" name = "goods_explain"></textarea>
                    </div>
                    <br/>
                    <input type = "hidden" class = "form-control" name = "goods_id" id = "goods_id" >
                    <div class = "d-grid gap-2 col-2 mx-auto">
                        <button type="submit" class="btn btn-primary">등록완료</button>
                    </div>
                </form>   
        </body>
        </html>
    
    
    
