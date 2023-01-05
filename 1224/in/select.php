li<?php
//1.  DB接続します
try {
    $pdo = new PDO('mysql:dbname=gs_db_1224;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }




//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM 1224_table");
$status = $stmt->execute();



//３．データ表示
$view="";
if($status==false) {
 //execute（SQL実行時にエラーがある場合）
 $error = $stmt->errorInfo();
 exit("ErrorQuery:".$error[2]);

} else {
 //Selectデータの数だけ自動でループしてくれる
 while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
         $view .= '<li class="products-item">';
        $view .= '<p class="cart-thumb"><img src="../img/'.$res["fname"].'"
        width="170"></p>';
        $view .= '<h2 class="title">'.$res["title"].'</h2>';
        $view .= '<p class="content">'.$res["content"].'</p>';
        $view .= '<p class="uname">'.$res["uname"].'</p>';
        $view .= '<a href="detail.php?id='.$res["id"].'" class="btn-update">編集</a>';
        $view .= '<a href="delete.php?id='.$res["id"].'" class="btn-delete">削除</a>';
         $view .= '</li>';
 }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="../css/reset.css">
  <link href="../css/select.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/jquery.bxslider.css">
</head>
<body class="cms">
  
  <header class="header">  </header>
    <div class="f-container">
        <div class="f-item">注目</div>
        <div class="f-item">メンバーシップ</div>
        <div class="f-item">買う</div>
        <div class="f-item">応募する</div>
        <div class="f-item">参加する</div>
        <div class="f-item">note活用術</div>
    </div>


  
    
    <div class="mmm">
      <nav class="left">left</nav>
      <main class="wrapper-main">
        <h1 class="kyo">今日の注目記事</h1>
        <ul class="cart-list">
            <?= $view;?>
        </ul>
      </main>
      <aside>right</aside>
    </div>


<footer></footer>

<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
</body>
</html>