<?php
require_once("../const/common.php");
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_TITLE ?></title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="header-wrapper">
            <a href="login.php">
                <h3>
                    <?php echo SITE_TITLE ?>
                    <?php if (isset($_SESSION['name'])) { ?><span style="font-size: small;"><?php echo $_SESSION['name']; ?>さんようこそ！！</span><?php } ?>
                </h3>
            </a>
            <div class="nav-button"><span class="navbar"></span><span class="navbar"></span><span class="navbar"></span></div>
            <ul class="global-nav">
                <li class="nav_item"><a href="wordlist.php">単語リスト</a></li>
                <li class="nav_item"><a href="register.php">新規登録</a></li>
                <?php if (isset($_SESSION['name'])) { ?>
                    <li class="nav_item"><a href="../controller/branch.php?command=logout">ログアウト</a></li>
                <?php } else { ?>
                    <li class="nav_item"><a href="login.php">ログイン</a></li>
                <?php } ?>
            </ul>
        </div>
    </header>