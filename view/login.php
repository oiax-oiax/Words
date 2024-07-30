<?php
session_start();
require_once("parts/header.php");
?>
<div class="article">
    <div class="article-wrapper">
        <?php if (isset($_SESSION['name'])) { ?>
            <p><?php echo $_SESSION['name']; ?>さんようこそ！！</p>
            <form action="../controller/branch.php" method="post">
                <input type="hidden" name="command" value="wordlist">
                <input type="submit" class="submit-button" value="単語帳へ">
            </form>
            <div class="submit-button"><a href="register.php">単語帳登録へ</a></div>
        <?php } else { ?>
            <p>名前とパスワードを入力して下さい</p>
            <form action="../controller/branch.php" method="post">
                <div style="margin: 0 auto 80px;">
                    <input type="hidden" name="command" value="login">
                    <label for="name">名前：
                        <div class="input-area">
                            <input type="text" id="name" name="name">
                        </div>
                    </label><br>
                    <label for="pass">パスワード：
                        <div class="input-area">
                            <input type="password" id="pass" name="pass">
                        </div>
                    </label>
                </div>
                <input type="submit" class="submit-button" value="ログインする">
            </form>
        <?php } ?>
    </div>
</div>
<?php
require_once("parts/footer.php");
?>