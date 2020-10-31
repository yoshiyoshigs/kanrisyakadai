<?php
require_once('funcs.php');

$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$bookcomment = $_POST["bookcomment"];
$id = $_POST["id"];

$pdo = db_conn();

$stmt = $pdo->prepare("UPDATE gs_bm_table 
                        SET bookname = :bookname,
                            bookurl = :bookurl,
                            bookcomment = :bookcomment,
                            indate = sysdate()
                        WHERE
                            id = :id;
                        ");



$stmt->bindValue(':bookname', h($bookname), PDO::PARAM_STR);      
$stmt->bindValue(':bookurl', h($bookurl), PDO::PARAM_STR);    
$stmt->bindValue(':bookcomment', h($bookcomment), PDO::PARAM_STR);        
$stmt->bindValue(':id', h($id), PDO::PARAM_INT); 

$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
    sql_error($stmt);
} else {
    // header('Location: select.php');
}
?>