<?php
// この設定ファイルに記入して、config/config.phpとして保存してください
// config/config.phpは秘密情報なので、Gitにコミットしてはいけません
$environment = ($_SERVER['SERVER_NAME'] === 'localhost') ? 'local' : 'remote';

if ($environment === 'local') {
  return [
    'DB_HOST' => 'localhost',
    'DB_NAME' => 'minicar-database',
    'DB_PORT' => '3306',
    'DB_USER' => '',
    'DB_PASS' => '',
  ];
} else {
  return [
    'DB_HOST' => '',
    'DB_NAME' => '',
    'DB_PORT' => '',
    'DB_USER' => '',
    'DB_PASS' => '',
  ];
<<<<<<< HEAD
}
=======
}
>>>>>>> 0edf446da1fa2a51484dc3dd8cbe9a6d21e520a0
