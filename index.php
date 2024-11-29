<?php

require_once __DIR__ . '/vendor/autoload.php';

use Controller\ContatoController;
use Controller\PessoaController;

// Configuração do Doctrine
$entityManager = require __DIR__ . '/config/bootstrap.php';
$pessoaController = new PessoaController($entityManager);
$contatoController = new ContatoController($entityManager);

// Roteamento simples
$rota = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$metodo = $_SERVER['REQUEST_METHOD'];

if ($rota === '/listarPessoas') {
    $pessoaController->listar();
} elseif ($rota === '/inserirPessoa') {
    $pessoaController->criar(($metodo === 'POST') ? $_POST : []);
} elseif ($rota === '/editarPessoa') {
    $id = $_GET['id'];
    $pessoaController->editar($id, ($metodo === 'POST') ? $_POST : []);
} elseif ($rota === '/excluirPessoa') {
    $id = $_GET['id'];
    $pessoaController->excluir($id);
} elseif ($rota === '/buscarPessoa' && $metodo === 'GET') {
    $termo = $_GET['termo'];
    $pessoaController->pesquisar($termo);
} elseif ($rota === '/listarContatos') {
    $contatoController->listar();
} elseif ($rota === '/inserirContato') {
    $contatoController->criar(($metodo === 'POST') ? $_POST : []);
} elseif ($rota === '/editarContato') {
    $id = $_GET['idContato'];
    $contatoController->editar($id, ($metodo === 'POST') ? $_POST : []);
} elseif ($rota === '/excluirContato') {
    $id = $_GET['idContato'];
    $contatoController->excluir($id);
} else {
    http_response_code(404);
    echo "Página não encontrada!";
}