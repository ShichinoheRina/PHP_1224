<?php


$id = $_GET['id'];

try {
    $pdo = new PDO('mysql:dbname=gs_db_1224;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }



$stmt = $pdo->prepare('SELECT * FROM 1224_table WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //PARAM_INTなので注意
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    // データが取得できた場合の処理
    $result = $stmt->fetch();
}
?>




<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="../css/index.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->
    <form action="update.php" method="post" class="flex-parent cartin-area cms-area" enctype="multipart/form-data">
        <div class="jumbotron">
            <p class="cms-thumb"><img src="https://placehold.jp/c9c9c9/ffffff/600×600.png?text=%E3%83%80%E3%83%9F%E3%83%BC%E7%94%BB%E5%83%8F" width="200"></p>
            <label><input type="file" name="fname" class="cms-item" accept="image/*" value=></label><br>
            <label>タイトル：<input type="text" name="title" value="<?=$result['title']?>"></label><br>
            <label><textarea name="content" rows="4" cols="40"><?=$result['content']?></textarea></label><br>
            <label>名前：<input type="text" name="uname" value="<?=$result['uname']?>"></label><br>
            <input type="hidden" name="id" value="<?=$result['id']?>">
            <input type="submit" value="修正">
        </div>
    </form>
</body>



<footer>
<script src="http://code.jquery.com/jquery-3.0.0.js"></script>
<script>
//---------------------------------------------------
//画像サムネイル表示
//---------------------------------------------------
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  //選択したファイルを取得し、file変数に格納
  var file = $(this).prop('files')[0];
  // 画像以外は処理を停止
  if (!file.type.match('image.*')) {
    // クリア
    $(this).val(''); //選択されてるファイルを空にする
    $('.cms-thumb > img').html(''); //画像表示箇所を空にする
    return;
  }
  // 画像表示
  var reader = new FileReader(); //1
  reader.onload = function() {   //2
    $('.cms-thumb > img').attr('src', reader.result);
  }
  reader.readAsDataURL(file);    //3
});
</script>
</footer>
</html>
