<?php
//POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['id'];
$lpw = $_POST['pass'];
$kanri = $_POST['rank'];
$life = $_POST['status'];

//DB接続
try {
    $pdo = new PDO('mysql:dbname=ga_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//データ登録SQL
$stmt = $pdo->prepare("INSERT INTO gs_user_table(id, name, lid, lpw, kanri, life)VALUES(NULL, :name, :lid, :lpw, :kanri, :life)");
$stmt->bindValue(':name', $name,  PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri', $kanri, PDO::PARAM_INT);
$stmt->bindValue(':life', $life, PDO::PARAM_INT);
$status = $stmt->execute();

//データ登録処理後
if($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorMessage:" . $error[2]);
} else{
    // header('Location: index.php');

}
?>