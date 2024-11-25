<?php

namespace Controller;

use Model\Pessoa;
use Doctrine\ORM\EntityManager;

class PessoaController {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function listar() {
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        require __DIR__ . '/../view/listarPessoas.php';
    }

    public function criar(array $dados){
        $pessoa = new Pessoa();
        $pessoa->setNome($dados['nome']);
        $pessoa->setCpf($dados['cpf']);

        $this->entityManager->persist($pessoa);
        $this->entityManager->flush();

        header('Location: /listarPessoas');
    }

    public function editar($id, array $dados) {
        $pessoa = $this->entityManager->find(Pessoa::class, $id);
        $pessoa->setNome($dados['nome']);
        $pessoa->setCpf($dados['cpf']);

        $this->entityManager->flush();

        header('Location: /listarPessoas');
    }

    public function excluir($id) {
        $pessoa = $this->entityManager->find(Pessoa::class, $id);
        $this->entityManager->remove($pessoa);
        $this->entityManager->flush();

        header('Location: /listarPessoas');
    }
}
