<?php 
$new = [$_POST['id'], $_POST['title'], $_POST['volume'], $_POST['price'], $_POST['release_date'] ,$_POST['memo']];

  $fp = fopen('./book.csv' , 'r');
  while($row = fgets($fp)){
    $list[] = explode(',' , str_replace("\n" , "" , $row));
  }
  fclose($fp);

  $user = [];
  foreach($list as $val){
    if($val[0] !== $_POST['id']){
      $user[] = $val;
    }
    else{
      $user[] = $new;
    }
  } 

  $fp = fopen('./book.csv' , 'w');
  for($i=0; $i<count($user); $i++){
    fputs($fp, $user[$i][0] . ','. $user[$i][1] . ','. $user[$i][2] . ','. $user[$i][3] . ','. $user[$i][4]. ','. $user[$i][5]."\n");
  }
  fclose($fp);

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
    <h1 class="my-5">単行本情報変更</h1>
    <section class="py-3">
    <h2>以下の内容で情報を変更しました。</h2>
      <div class="my-3">
        <form action="update_complete.php" method="post">
          <input type="hidden" name="id" value="<?php echo $row[0]; ?>">
            <div class="form-group form-inline"><label for="title">タイトル</label><span><?php echo $new[1];?></span></div>
            <div class="form-group form-inline"><label for="volume">巻数</label><span><?php echo $new[2];?></span>巻</div>
            <div class="form-group form-inline"><label for="price">価格</label><span><?php echo $new[3];?></span>円</div>
            <div class="form-group form-inline"><label for="release_date">発売日</label><span><?php echo substr($new[4],0,4);?>年<?php echo substr($new[4],4,2);?>月<?php echo substr($new[4],6,7);?>日</span></div>
            <div class="form-group form-inline"><label for="memo">一言メモ</label><span><?php echo $new[5];?></span></div>
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
