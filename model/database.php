<?php
require_once('../config/config.php');
function login($name)
{
    global $dbh;
    $sql = "SELECT pass FROM member WHERE name=?";
    $stmt = $dbh->prepare($sql);
    $data = array($name);
    $stmt->execute($data);
    $dbh = null;
    return $stmt->fetch(PDO::FETCH_ASSOC);;
}
function register_member($name, $pass)
{
    global $dbh;
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO member(name,pass) VALUES(?,?)";
    $stmt = $dbh->prepare($sql);
    $data = array($name, $password);
    $stmt->execute($data);
    $dbh = null;
}
function register_word($word, $ja, $name)
{
    global $dbh;

    try {
        $dbh->beginTransaction();

        $sql = "INSERT INTO word(word, ja, name) VALUES(:word, :ja, :name)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':word', $word, PDO::PARAM_STR);
        $stmt->bindParam(':ja', $ja, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();

        $dbh->commit();
        return true;
    } catch (PDOException $e) {
        $dbh->rollBack();
        echo "エラーコード: " . $e->getCode() . "<br>";
        echo "エラーメッセージ: " . $e->getMessage() . "<br>";
        return false;
    }
}
// function register_word($word,$ja,$name){
//     global $dbh;
//     $sql = "INSERT INTO word(word,ja,name) VALUES(?,?,?)";
//     $stmt = $dbh->prepare($sql);
//     $data = array($word,$ja,$name);
//     $stmt->execute($data);
//     $dbh = null;
// }
function word_list($name)
{
    global $dbh;
    $sql = "SELECT * FROM word WHERE name=?";
    $stmt = $dbh->prepare($sql);
    $data = array($name);
    $stmt->execute($data);
    $dbh = null;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function word($id)
{
    global $dbh;
    $sql = "SELECT * FROM word WHERE id=?";
    $stmt = $dbh->prepare($sql);
    $data = array($id);
    $stmt->execute($data);
    $dbh = null;
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function edit_word($id, $word, $ja)
{
    global $dbh;
    $sql = "UPDATE word SET word=?, ja=?  WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $data = array($word, $ja, $id);
    $stmt->execute($data);
    $dbh = null;
}

function delete_word($id)
{
    global $dbh;
    $sql = "DELETE FROM word WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $data = array($id);
    $stmt->execute($data);
    $dbh = null;
}
