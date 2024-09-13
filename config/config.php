<?php
function loadEnv($path)
{
    if (!file_exists($path)) {
        throw new \InvalidArgumentException(sprintf('%s does not exist', $path));
    }

    if (!is_readable($path)) {
        throw new \RuntimeException(sprintf('%s file is not readable', $path));
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);

        if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
            putenv(sprintf('%s=%s', $name, $value));
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }
}
loadEnv(dirname(__DIR__) . '/.env');

if (!isset($_ENV['DB_NAME']) || !getenv('HOST') || !getenv('USER_NAME') || !getenv('PASSWORD')) {
    die('環境変数が正しく設定されていません。.envファイルを確認してください。');
}

$db = getenv('DB_NAME');
$host = getenv('HOST');
$user = getenv('USER_NAME');
$password = getenv('PASSWORD');

$dsn = "mysql:dbname=$db;host=$host;charset=utf8";
$dbh = new PDO($dsn, $user, $password);
