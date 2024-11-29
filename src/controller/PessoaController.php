<?php

namespace Controller;

use Model\Pessoa;
use Doctrine\ORM\EntityManager;

class PessoaController {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * Lista todos as pessoas salvas
     */
    public function listar() {
        try{
            $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
            require __DIR__ . '/../view/pessoa/listarPessoas.php';
        } catch (\Throwable $t) {
            echo "Erro ao listar pessoas: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao listar pessoas: " . $e->getMessage();
        }
    }

    /**
     * Adiciona uma nova pessoa
     * @param array $dados
     */
    public function criar(array $dados = []) {
        try {
            if ($dados) {
                /** @var Pessoa $pessoa */
                $pessoa = new Pessoa();
                $pessoa->setNome($dados['nome']);
                $pessoa->setCpf($dados['cpf']);
    
                $this->entityManager->persist($pessoa);
                $this->entityManager->flush();
    
                header('Location: /listarPessoas');
                exit;
            }
    
            require __DIR__ . '/../view/pessoa/inserirPessoa.php';
        } catch (\Throwable $t) {
            echo "Erro ao criar pessoa: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao criar pessoa: " . $e->getMessage();
        }
    }

    /**
     * Altera uma pessoa existente
     * @param int $id
     * @param array $dados
     */
    public function editar($id, array $dados = null) {
        try {
            /** @var Pessoa $pessoa */
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
        } catch (\Throwable $t) {
            echo "Erro ao editar pessoa: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao editar pessoa: " . $e->getMessage();
        }
    }

    /**
     * Remove uma pessoa existente
     * @param int $id
     */
    public function excluir($id) {
        try {
            /** @var Pessoa $pessoa */
            $pessoa = $this->entityManager->find(Pessoa::class, $id);
            if (!$pessoa) {
                echo "Pessoa não encontrada!";
                return;
            }
    
            $this->entityManager->remove($pessoa);
            $this->entityManager->flush();
    
            header('Location: /listarPessoas');
            exit;
        } catch (\Throwable $t) {
            echo "Erro ao excluir pessoa: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao excluir pessoa: " . $e->getMessage();
        }
    }

    /**
     * Realiza busca de pessoas pelo Nome/CPF
     * @param string $valor
     */
    public function pesquisar($valor) {
        try {
            $query = $this->entityManager->createQuery(
                'SELECT p FROM Model\Pessoa p WHERE p.nome LIKE :valor OR p.cpf LIKE :valor'
            );
    
            $query->setParameter('valor', '%' . $valor . '%');
            $pessoas = $query->getResult();
            require __DIR__ . '/../view/pessoa/listarPessoas.php';
        } catch (\Throwable $t) {
            echo "Erro ao buscar pessoa(s): " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao buscar pessoa(s): " . $e->getMessage();
        }
    }
}