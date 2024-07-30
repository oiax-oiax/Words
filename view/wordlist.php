<?php
session_start();
$words = $_SESSION['rec'] ?? '';
require_once("parts/header.php");
?>
<div class="article">
    <?php if (isset($_SESSION['rec']) && $_SESSION['rec'] !== '') { ?>
        <h2>単語一覧</h2>
        <ul class="wordlist">
            <?php foreach ($words as $word): ?>
                <li class="article-wrapper word">
                    <p>単語 ：<?php echo htmlspecialchars($word['word']); ?></p>
                    <p>意味 ：<?php echo htmlspecialchars($word['ja']); ?></p>
                    <form action="../controller/branch.php" method="post">
                        <input type="hidden" name="command" value="word">
                        <input type="hidden" name="id" value="<?php echo $word['id'] ?>">
                        <button class="submit-button">編集する</button>
                    </form>
                    <form action="../controller/branch.php" method="post">
                        <input type="hidden" name="command" value="delete-word">
                        <input type="hidden" name="id" value="<?php echo $word['id'] ?>">
                        <div class="submit-button" id="word-delete">
                            削除する
                        </div>
                        <button class="word-delete-button">本当に削除する？</button>
                    </form>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="submit-button"><a href="register.php">単語登録</a></div>

    <?php } else {
        header("Location:login.php");
    } ?>
</div>
<?php
require_once("parts/footer.php");
?>