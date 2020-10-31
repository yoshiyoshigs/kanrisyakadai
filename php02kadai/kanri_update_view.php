<?php
//POSTデータ取得
$id = $_GET['id'];

// require_once("funcs.php");
// $pdo = db_conn();


//DB接続
try {
    $db_name = "ga_table";
    $db_id = "root";
    $db_pw = "root";
    $db_host = "localhost";
    $pdo = new PDO('mysql:dbname='. $db_name.';charset=utf8;host=' . $db_host, $db_id, $db_pw);
} catch (PDOException $e) {
    exit('DB ConnectError:'. $e->getMessage());
}

//データ登録
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id =" .$id);
$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
$view = "";
if ($status == false){
  $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
  $result = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザー一覧表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="kanri_index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->
    <form method="post" action="kanri_insert.php">
  <div class="jumbotron">
   <fieldset>
   <legend>管理ユーザーリスト</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ID：<input type="text" name="id"></label><br>
     <label>パスワード：<input type="text" name="pass"></label><br>
     <label>ランク：<input type="text" name="rank"></label><br>
     <label>ステータス：<input type="text" name="status"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
    
    <!-- Main[Start] -->
    
    <!-- Main[End] -->

</body>

</html>
