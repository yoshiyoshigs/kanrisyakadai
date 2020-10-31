<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>BOOK MARK</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="kanri_select.php">kanri user</a></div>
    </div>
  </nav>
</header>

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
    
</body>
</html>