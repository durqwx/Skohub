<?

try {
    $dsn = 'mysql:host=localhost;dbname=kurs';
    // $connection= new PDO ($dsn, 'root', '');
    $connection= new PDO ($dsn, 'root', '');
} 
catch (PDOException $exception) {
    echo $exception->getMessage();
}

?>