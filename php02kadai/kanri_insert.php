<?php
//POSTデータ取得
$name = $_POST['name'];
$id = $_POST['id'];
$pass = $_POST['pass'];
$rank = $_POST['rank'];
$status = $_POST['status'];


//DB接続
try {
    $pdo = new PDO('mysql:dbname=ga_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//データ登録SQL
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, name, lid, lpw, kanri, life)VALUES(NULL, :name, :id, :pw, :rank, :status)");
$stmt->bindValue(':name', $name,  PDO::PARAM_STR);
$stmt->bindValue(':lid', $id, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $pw, PDO::PARAM_STR);
$stmt->bindValue(':kanri', $rank, PDO::PARAM_STR);
$stmt->bindValue(':life', $status, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorMessage:" . $error[2]);
} else{
    // header('Location: index.php');

}
?>