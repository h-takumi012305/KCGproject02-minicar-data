
<?php 
// データベースに接続して、データへアクセスするためのPDOオブジェクトを返す関数
// (クラスメソッドにすることもできますが、今回は関数にしています)
function createPDO(array $config): PDO 
{ 
    $dsn = 'mysql:host=' . $config['DB_HOST'] . ';dbname=' . $config['DB_NAME'] . ';port=' . $config['DB_PORT']; 
    return new PDO(
        $dsn, 
        $config['DB_USER'], 
        $config['DB_PASS'], 
        [ 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ]
    ); 
} 
?>