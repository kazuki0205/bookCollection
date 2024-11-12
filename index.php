<?php 
  // 全件取得プログラム
    $fp = fopen('./book.csv' , 'r');
    while($row = fgets($fp)){
      $list[] = explode(',' , $row);
    }
    fclose($fp);
   // 全件取得プログラムここまで

    //昇順・降順
  if(isset($_GET['sort'])){
    foreach($list as $val){
      $date[] = $val[4];
    }
    if($_GET['sort'] == 0){
      array_multisort($date, SORT_ASC, $list);
    } 
    else{
      array_multisort($date, SORT_DESC,$list);
    }
  } //昇順・降順ここまで

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>タイトル</title>
<meta content="タイトル" name="title">
<meta content="ディスクリプション" name="description">
<meta content="キーワード" name="keywords">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="./css/reset.css">
<link rel="stylesheet" href="./css/common.css">
<link rel="stylesheet" href="./css/index.css">
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
    <h1 class="my-5">単行本一覧</h1>
    <section class="py-3">
      <div>
        <table class="table table-hover table-condensed">
          <tr><th>タイトル</th><th>巻数</th><th>発売日<a href="./index.php?sort=0"><i class="fas fa-arrow-alt-circle-up"></i></a><a href="./index.php?sort=1"><i class="fas fa-arrow-alt-circle-down"></i></a></th><th>変更・削除</th></tr>
          <?php if(isset($list)):?>
          <?php foreach($list as $val):?>
          <tr>
            <td><a href="./detail.php?detail=<?php echo $val[0];?>"><?php echo $val[1];?></a></td>
            <td><?php echo $val[2];?>巻</td>
            <td><?php echo substr($val[4],0,4);?>年<?php echo substr($val[4],4,2);?>月<?php echo substr($val[4],6,7);?>日</td>
            <td><a href="./update.php?update=<?php echo $val[0];?>"><i class="fas fa-edit"></i>変更</a><a href="./delete.php?delete=<?php echo $val[0];?>"><i class="fas fa-trash-alt"></i>削除</a></td>
          </tr>
          <?php endforeach;?>
          <?php endif?>
        </table>
      </div>
    </section>
    <hr>
    <section class="py-3">
      <div>
        <form action="./input.php" method="post">
          <button type="submit" class="btn btn-primary">単行本を登録する</button>
        </form>
      </div>
    </section>
  </main>

</body>

</html>
