<?php 
   // 全件取得プログラム
  $fp = fopen('./book.csv' , 'r');
  while($row = fgets($fp)){
    $list[] = explode(',' , $row);
  }
  fclose($fp);
  // 全件取得プログラムここまで

  foreach($list as $val){
    if($val[0] == $_GET['update']){
      $list2 = $val;
      break;
    }
  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>タイトル</title>
<meta content="タイトル" name="title">
<meta content="ディスクリプション" name="description">
<meta content="キーワード" name="keywords">
<link rel="stylesheet" href="./css/reset.css">
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/process.css">
<script src="./js/jquery-1.12.0.min.js" charset="utf-8"></script>
<script src="./bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<link href="./css/input/style.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script src="./js/sample.js"></script>
</head>
<body>
  <main class="container">
    <h1 class="my-5">単行本情報変更</h1>
    <section class="py-3">
      <div class="my-3">
        <form action="update_complete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $list2[0];?>">
            <div class="form-group form-inline"><label for="title">タイトル</label><input type="text" class="form-control col-2" id="title" name="title" value="<?php echo $list2[1];?>"></div>
            <div class="form-group form-inline"><label for="volume">巻数</label><input type="text" class="form-control col-2" id="volume" name="volume" value="<?php echo $list2[2];?>">巻</div>
            <div class="form-group form-inline"><label for="price">価格</label><input type="text" class="form-control col-2" id="price" name="price" value="<?php echo $list2[3];?>">円</div>
            <div class="form-group form-inline"><label for="release_date">発売日</label><input type="text" class="form-control col-2" id="release_date" name="release_date" value="<?php echo $list2[4];?>"></div>
            <div class="form-group form-inline"><label for="memo">一言メモ</label><input type="text" class="form-control col-2" id="memo" name="memo" value="<?php echo $list2[5];?>"></div>
            <button type="submit" class="btn btn-primary my-3" name="state" value="update">単行本の情報を変更する</button>
        </form>
      </div>
    </section>
  </main>

</body>

</html>