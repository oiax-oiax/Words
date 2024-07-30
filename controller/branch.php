<?php
session_start();
require("../model/database.php");
if (isset($_POST['id'])) {
    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8');
}
if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'utf-8');
}
if (isset($_POST['pass'])) {
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'utf-8');
}
if (isset($_POST['pass1'])) {
    $pass1 = htmlspecialchars($_POST['pass1'], ENT_QUOTES, 'utf-8');
    $pass2 = htmlspecialchars($_POST['pass2'], ENT_QUOTES, 'utf-8');
}
if (isset($_POST['command'])) {
    $command = htmlspecialchars($_POST['command'], ENT_QUOTES, 'utf-8');
}
if (isset($_GET['command'])) {
    $command = htmlspecialchars($_GET['command'], ENT_QUOTES, 'utf-8');
}
if (isset($_POST['word'])) {
    $word = htmlspecialchars($_POST['word'], ENT_QUOTES, 'utf-8');
}
if (isset($_POST['ja'])) {
    $ja = htmlspecialchars($_POST['ja'], ENT_QUOTES, 'utf-8');
}
if (isset($_SESSION['name'])) {
    $name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'utf-8');
}

if ($command === "register") {
    if ($pass1 === $pass2) {
        register_member($name, $pass1);
        header("Location:../view/index.php?comment=登録が完了しました。");
        exit();
    } else {
        header("Location:../view/register.php?comment=同じパスワード入力して下さい。");
    }
}
if ($command === "login") {
    $login = login($name);
    var_dump($login);
    if (!$login) {
        header("Location:../view/index.php?comment=お名前が登録されていません");
        exit();
    } elseif (password_verify($pass, $login['pass'])) {
        $_SESSION['name'] = $name;
        header("Location:../view/login.php");
        exit;
    } else {
        // echo var_dump($pass);
        // echo var_dump($login['pass']);
        // echo var_dump(password_verify($pass,$login['pass']));
        header("Location:../view/index.php?comment=パスワードが間違っています");
        exit;
    }
}
if ($command === "logout") {
    session_destroy();
    header("Location:../view/index.php?comment=ログアウトしました");
}
if ($command === "register-word") {
    register_word($word, $ja, $name);
    header("Location:../view/index.php?comment=単語の登録が完了しました。<p>単語　：$word</p><p>日本語：$ja</p>");
    exit;
}
if ($command === "wordlist") {
    $words = word_list($name);
    $_SESSION['rec'] = $words;
    header("Location:../view/wordlist.php");
    exit;
}

if ($command === "word") {
    $word = word($id);
    $_SESSION['word'] = $word;
    header("Location:../view/register.php");
}

if ($command === "edit-word") {
    edit_word($id, $word, $ja);
    header("Location:../view/index.php?comment=編集しました");
}

if ($command === "delete-word") {
    delete_word($id);
    header("Location:../view/index.php?comment=削除しました。");
}
