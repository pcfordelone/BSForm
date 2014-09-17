<?php

try {
    $pdo = new PDO("sqlite:demo.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("DROP TABLE IF EXISTS categorias");
    $pdo->exec("CREATE TABLE IF NOT EXISTS categorias ( id INTEGER PRIMARY KEY, categoria VARCHAR(50) )");

    $categorias = ["Alimentação","Bebidas","Higiene Pessoal","Padaria"];

    $sql = "INSERT INTO categorias (categoria) VALUES (:cat)";
    $stmt = $pdo->prepare($sql);

    foreach($categorias as $categoria) {
        $stmt->bindParam('cat', $categoria);
        $stmt->execute();
    }

} catch (PDOException $ex) {
    die(
        "Error Code    : " . $ex->getCode()    . "\n" .
        "Error Message : " . $ex->getMessage() . "\n" .
        "File          : " . $ex->getFile()    . "\n" .
        "Line Number   : " . $ex->getLine()
    );
}