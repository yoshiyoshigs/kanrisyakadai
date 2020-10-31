<?php

try {
    $pdo = new PDO('mysql:dbname=ga_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .='<a href="kanri_update_view.php?id=' . $result["id"] . '">';
    $view .=  $result['indate'] . ' ' . $result['name']  . ' ' . $result['id'] . ' ' . $result['pass']. ' ' . $result['rank']. ' ' . $result['status'];
    if($rank == 0){
      echo "管理者";
      } elseif($rank == 1) {
      echo "スーパー管理者";
      }
    $view .= "</a>";

    $view .= '<a href="kanri_delete.php?id=' . $result["id"] . '">';
    $view .=  '[削除]';
    $view .= '</a>';

    $view .= "</p>";
    // var_dump($result);
    
  }

}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>管理ユーザーリスト</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="kanri_index.php">会員登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?= $view ?>
    <a href="kanri_select.php"></a>
    <?= $view ?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>
