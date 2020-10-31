<?php
//POSTデータ取得
$bookname = $_POST['bookname'];
$bookurl = $_POST['bookurl'];
$bookcomment = $_POST['bookcomment'];


//DB接続
try {
    $pdo = new PDO('mysql:dbname=gs_yoshiyoshi;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//データ登録SQL
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, bookname, bookurl, bookcomment, indate)VALUES(NULL, :bookname, :bookurl, :bookcomment, sysdate())");
$stmt->bindValue(':bookname', $bookname,  PDO::PARAM_STR);
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR);
$status = $stmt->execute();

//データ登録処理後
if($status==false) {
    $error = $stmt->errorInfo();
    exit("ErrorMessage:" . $error[2]);
} else{
    // header('Location: index.php');

}
?>