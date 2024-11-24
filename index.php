<?php

try {
    $connection = new PDO('pgsql:host=db;port=5432;dbname=teste_backend', 'postgres', 'teste123');
    echo "Conexão bem-sucedida!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}