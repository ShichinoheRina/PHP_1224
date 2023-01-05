<?php
//記事のタイトル 受信チェック:title
if(!isset($_POST["title"]) || $_POST["title"]==""){
    exit("ParameError!title!");
}    
//記事の内容 受信チェック:content
if(!isset($_POST["content"]) || $_POST["content"]==""){
    exit("ParameError!content!");
}    

//名前 受信チェック:uname
if(!isset($_POST["uname"]) || $_POST["uname"]==""){
    exit("ParameError!uname!");
}    

// ファイル受信チェック※$_FILES["******"]["name"]の場合
if(!isset($_FILES["fname"]["name"])|| $_FILES["fname"]["name"]=="") {
    exit("ParameError!files!");
}    


$fname  = $_FILES["fname"]["name"];   //画像File名
$title  = $_POST["title"];   //記事のタイトル
$content  = $_POST["content"];   //記事の内容
$uname  = $_POST["uname"];   //名前





$upload = "../img/"; //画像アップロードフォルダへのパス
//アップロードした画像を../img/へ移動させる記述↓
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['fname']['error'];
}



try {
    $pdo = new PDO('mysql:dbname=gs_db_1224;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
  }

  
$stmt = $pdo->prepare("INSERT INTO 1224_table(id, title, content, fname,
uname, indate )VALUES(NULL, :title, :content, :fname, :uname, sysdate())");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR); //数値
$stmt->bindValue(':fname', $fname, PDO::PARAM_STR);
$stmt->bindValue(':uname', $uname, PDO::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }else{
    //５．item.phpへリダイレクト
    header("Location: select.php");
    exit;
  }

?>