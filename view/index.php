<?php
session_start();
$words = $_SESSION['rec'] ?? '';
require_once("parts/header.php");
?>
<div class="article">
    <div class="article-wrapper">
        <?php if (isset($_SESSION['name']) && isset($_GET['comment'])) { ?>
            <p style="color:red;"><?php echo $_GET['comment']; ?></p>
            <form action="../controller/branch.php" method="post">
                <input type="hidden" name="command" value="wordlist">
                <input type="submit" class="submit-button" value="単語帳へ">
            </form>
            <div class="submit-button"><a href="register.php">単語帳登録へ</a></div>
        <?php } else { ?>
            <p>ようこそ</p>
            <p>いらっしゃいました</p>
            <p>まずはログインして下さい</p>
            <div class="submit-button"><a href="login.php">ログイン</a></div>
        <?php } ?>
    </div>
</div>
<?php
require_once("parts/footer.php");
?>