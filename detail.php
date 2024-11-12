<?php 
  // 全件取得プログラム
  $fp = fopen('./book.csv' , 'r');
  while($row = fgets($fp)){
    $list[] = explode(',' , $row);
  }
  fclose($fp);
  // 全件取得プログラムここまで

  $detail = [];
  foreach($list as $val){
    if($val[0] === $_GET['detail']){
      $detail = $val;
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
<!-- <link href="./css/input/style.css" rel="stylesheet"> -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script src="./js/sample.js"></script>
</head>
<body>
  <main class="container">
    <h1 class="my-5">単行本情報</h1>
    <section class="py-3">
      <div class="my-3">
        <form action="update_complete.php" method="post">
            <div class="form-group form-inline"><label for="title">タイトル</label><span><?php echo $detail[1];?></span></div>
            <div class="form-group form-inline"><label for="volume">巻数</label><span><?php echo $detail[2];?></span>巻</div>
            <div class="form-group form-inline"><label for="price">価格</label><span><?php echo $detail[3];?></span>円</div>
            <div class="form-group form-inline"><label for="release_date">発売日</label><span><?php echo substr($detail[4],0,4);?>年<?php echo substr($detail[4],4,2);?>月<?php echo substr($detail[4],6,7);?>日</span></div>
            <div class="form-group form-inline"><label for="memo">一言メモ</label><span><?php echo $detail[5];?></span></div>
        </form>
      </div>
    </section>
    <hr>
    <section class="py-3">
      <div>
        <form action="./index.php" method="post">
          <button type="submit" class="btn btn-primary">一覧に戻る</button>
        </form>
      </div>
    </section>
  </main>

</body>

</html>
