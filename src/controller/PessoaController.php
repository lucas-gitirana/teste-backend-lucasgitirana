<?php

namespace Controller;

use Model\Pessoa;
use Doctrine\ORM\EntityManager;

class PessoaController
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function listar()
    {
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        require __DIR__ . '/../view/pessoa/listarPessoas.php';
    }

    public function criar(array $dados = [])
    {
        if ($dados) {
            $pessoa = new Pessoa();
            $pessoa->setNome($dados['nome']);
            $pessoa->setCpf($dados['cpf']);

            $this->entityManager->persist($pessoa);
            $this->entityManager->flush();

            header('Location: /listarPessoas');
            exit;
        }

        require __DIR__ . '/../view/pessoa/inserirPessoa.php';
    }

    public function editar($id, array $dados = null)
    {
        $pessoa = $this->entityManager->find(Pessoa::class, $id);

        if (!$pessoa) {
            echo "Pessoa não encontrada!";
            return;
        }

        if ($dados) {
            $pessoa->setNome($dados['nome']);
            $pessoa->setCpf($dados['cpf']);
            $this->entityManager->flush();
            header('Location: /listarPessoas');
            exit;
        }

        require __DIR__ . '/../view/pessoa/editarPessoa.php';
    }

    public function excluir($id)
    {
        $pessoa = $this->entityManager->find(Pessoa::class, $id);

        if (!$pessoa) {
            echo "Pessoa não encontrada!";
            return;
        }

        $this->entityManager->remove($pessoa);
        $this->entityManager->flush();

        header('Location: /listarPessoas');
        exit;
    }

    public function pesquisar($valor)
    {
        $query = $this->entityManager->createQuery(
            'SELECT p FROM Model\Pessoa p WHERE p.nome LIKE :valor OR p.cpf LIKE :valor'
        );
        $query->setParameter('valor', '%' . $valor . '%');

        $pessoas = $query->getResult();

        require __DIR__ . '/../view/pessoa/listarPessoas.php';
    }
}