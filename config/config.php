<?php
// この設定ファイルに記入して、config/config.phpとして保存してください
// config/config.phpは秘密情報なので、Gitにコミットしてはいけません
$environment = ($_SERVER['SERVER_NAME'] === 'localhost') ? 'local' : 'remote';

if ($environment === 'local') {
  return [
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'minicar-database',
    'DB_PORT' => '3306',
    'DB_USER' => 'root',
    'DB_PASS' => '1234',
  ];
} else {
  return [
    'DB_HOST' => '',
    'DB_NAME' => '',
    'DB_PORT' => '',
    'DB_USER' => '',
    'DB_PASS' => '',
  ];
}