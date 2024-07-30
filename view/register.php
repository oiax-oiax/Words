<?php
session_start();
require_once("parts/header.php");
?>
<div class="article">
    <div class="article-wrapper">

        <?php if (isset($_SESSION['word'])) {
            $word = $_SESSION['word'][0]; ?>
            <p><?php echo $_SESSION['name']; ?>さんようこそ！！</p>
            <form action="../controller/branch.php" method="post">
                <input type="hidden" name="command" value="edit-word">
                <input type="hidden" name="id" value="<?php echo $word['id'] ?>">
                <br>
                <p>単語を編集して下さい</p>
                <br>
                <label for="word">単語：
                    <div class="input-area">
                        <input type="text" id="word" name="word" value="<?php echo $word["word"]; ?>">
                    </div>
                    <br>
                    <label for="ja">日本語：
                        <div class="input-area">
                            <input type="text" id="ja" name="ja" value="<?php echo $word["ja"]; ?>">
                        </div>
                        <br>
                        <input type="submit" class="submit-button" id="word-register-button" value="編集する" style="margin-top: 10px;">
            </form>
            <a href="login.php">
                <div class="submit-button">戻る</div>
            </a>
        <?php } elseif (isset($_SESSION['name'])) { ?>
            <p><?php echo $_SESSION['name']; ?>さんようこそ！！</p>
            <form action="../controller/branch.php" method="post">
                <input type="hidden" name="command" value="register-word">
                <br>
                <p>単語を登録して下さい</p>
                <br>
                <label for="word">単語：
                    <div class="input-area">
                        <input type="text" id="word" name="word">
                    </div>
                    <br>
                    <label for="ja">日本語：
                        <div class="input-area">
                            <input type="text" id="ja" name="ja">
                        </div>
                        <br>
                        <input type="submit" class="submit-button" id="word-register-button" value="登録する" style="margin-top: 10px;">
            </form>
            <a href="login.php">
                <div class="submit-button">戻る</div>
            </a>
        <?php } else { ?>
            <form action="../controller/branch.php" method="post">
                <?php if (isset($_GET['comment'])) { ?>
                    <p style="color:red;"><?php echo $_GET['comment']; ?></p>
                <?php } ?>
                <p style="margin:0 auto; width:80px;">新規登録</p>
                <input type="hidden" name="command" value="register">
                <label for="name">名前：
                    <div class="input-area">
                        <input type="text" id="name" name="name">
                    </div>
                </label>
                <label for="pass1">パスワード：
                    <div class="input-area">
                        <input type="password" id="pass1" name="pass1">
                    </div>
                </label>
                <label for="pass2">パスワード再入力：
                    <div class="input-area">
                        <input type="password" id="pass2" name="pass2">
                    </div>
                </label>
                <input type="submit" class="submit-button" id="register-button" value="登録する" style="display: block;margin:30px auto 0;">
            </form>
            <a href="login.php"><button class="submit-button" style="margin:0 auto;">ログイン</button></a>
        <?php } ?>
    </div>
</div>
<?php
require_once("parts/footer.php");
?>