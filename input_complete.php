<?php 
  $list = [$_POST['title'], $_POST['volume'], $_POST['price'], $_POST['release_date'] ,$_POST['memo']];

  $max = 0;
  $fp = fopen('./book.csv' , 'r');
  while($row = fgets($fp)){
    $member = explode(',' , str_replace("\n" , "" , $row));
    if($max < $member[0]){
      $max = $member[0];
    }
  }
  fclose($fp);
  $max++;

  $fp = fopen('./book.csv' , 'a');
  fputs($fp, $max . ',' . implode(',' , $list)."\n");
  fclose($fp)

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
<link href="./css/input/style.css" rel="stylesheet">
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/process.css">
<script src="./js/jquery-1.12.0.min.js" charset="utf-8"></script>
<script src="./bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
<script src="./js/sample.js"></script>
</head>
<body>
  <main class="container">
    <h1 class="my-5">単行本情報登録</h1>
    <section class="py-3">
    <h2>以下の内容で情報を登録しました。</h2>
      <div class="my-3">
        <form action="input_complete.php" method="post">
            <div class="form-group form-inline"><label for="title"></label><span><?php echo $list[0];?></span></div>
            <div class="form-group form-inline"><label for="volume">巻数</label><span><?php echo $list[1];?></span>巻</div>
            <div class="form-group form-inline"><label for="price">価格</label><span><?php echo $list[2];?></span>円</div>
            <div class="form-group form-inline"><label for="release_date">発売日</label><span><?php echo substr($list[3],0,4);?>年<?php echo substr($list[3],4,2);?>月<?php echo substr($list[3],6,7);?>日</span></div>
            <div class="form-group form-inline"><label for="memo">一言メモ</label><span><?php echo $list[4];?></span></div>
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
