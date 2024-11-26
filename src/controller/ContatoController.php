<?php

namespace Controller;

use Doctrine\ORM\EntityManager;
use Model\Contato;
use Model\Pessoa;

class ContatoController {
    private $entityManager;

    public function __construct(EntityManager $entityManager) {
        $this->entityManager = $entityManager;
    }

    public function listar() {
        $contatos = $this->entityManager->getRepository(Contato::class)->findAll();
        require __DIR__ . '/../view/contato/listarContatos.php';
    }

    public function criar(array $dados = []){
        if ($dados) {
            $pessoa = $this->entityManager->find(Pessoa::class, $dados['pessoa_id']);
            if (!$pessoa) {
                echo "Pessoa não encontrada!";
                return;
            }

            $contato = new Contato();
            $contato->setTipo($dados['tipo']);
            $contato->setDescricao($dados['descricao']);
            $contato->setPessoa($pessoa);
    
            $this->entityManager->persist($contato);
            $this->entityManager->flush();
    
            header('Location: /listarContatos');
            exit;
        }

        require __DIR__ . '/../view/contato/inserirContato.php';
    }

    public function editar($id, array $dados = null) {
        $contato = $this->entityManager->find(Contato::class, $id);

        if (!$contato) {
            echo "Contato não encontrado!";
            return;
        }

        if ($dados) {
            $pessoa = $this->entityManager->find(Pessoa::class, $dados['pessoa_id']);
            if (!$pessoa) {
                echo "Pessoa não encontrada!";
                return;
            }

            $contato->setTipo($dados['tipo']);
            $contato->setDescricao($dados['descricao']);
            $contato->setPessoa($pessoa);
            $this->entityManager->flush();


            header('Location: /listarContatos');
            exit;
        }

        require __DIR__ . '/../view/contato/editarContato.php';
    }

    public function excluir($id){
        $contato = $this->entityManager->find(Contato::class, $id);

        if (!$contato) {
            echo "Contato não encontrado!";
            return;
        }

        $this->entityManager->remove($contato);
        $this->entityManager->flush();

        header('Location: /listarContatos');
        exit;
    }
}