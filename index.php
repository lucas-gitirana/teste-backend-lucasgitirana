<?php

require_once __DIR__ . '/vendor/autoload.php';

use Controller\PessoaController;

// Configuração do Doctrine
$entityManager = require __DIR__ . '/config/bootstrap.php';
$pessoaController = new PessoaController($entityManager);

// Roteamento simples
$rota = $_SERVER['REQUEST_URI'];
$metodo = $_SERVER['REQUEST_METHOD'];

if ($rota === '/listarPessoas') {
    $pessoaController->listar();
} elseif ($rota === '/inserirPessoa' && $metodo === 'GET') {
    require __DIR__ . '/src/view/inserirPessoa.php';
} elseif ($rota === '/inserirPessoa' && $metodo === 'POST') {
    $pessoaController->criar($_POST);
} elseif ($rota === '/editarPessoa' && $metodo === 'GET') {
    $id = $_GET['id'];
    require __DIR__ . '/src/view/editarPessoa.php';
} elseif ($rota === '/editarPessoa' && $metodo === 'POST') {
    $id = $_GET['id'];
    $pessoaController->editar($id, $_POST);
} elseif ($rota === '/excluirPessoa') {
    $id = $_GET['id'];
    $pessoaController->excluir($id);
} else {
    http_response_code(404);
    echo "Página não encontrada!";
}
