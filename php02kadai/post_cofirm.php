<?php

require_once('func.php');

$bookname = $_POST['bookname'];
$bookurl = $_POST['bookurl'];
$bookcomment = $_POST['bookcomment'];
?>

<html>

<head>
    <meta charset="utf-8">
    <title>POST（受信）</title>
</head>

<body>
    書籍名：<?= htmlspecialchars($bookname, ENT_QUOTES) ?>
    <!-- ↓関数利用の場合 -->
    書籍名：<?= h($bookname) ?>

    書籍URL：<?= htmlspecialchars($bookurl, ENT_QUOTES) ?>
    <!-- ↓関数利用の場合 -->
    書籍URL：<?= h($bookurl) ?>

    書籍コメント：<?= htmlspecialchars($bookcomment, ENT_QUOTES) ?>
    <!-- ↓関数利用の場合 -->
    書籍コメント：<?= h($bookcomment) ?>
    <ul>
        <li><a href="index.php">index.php</a></li>
    </ul>
</body>

</html>
