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

    /**
     * Lista todos os contatos salvos
     */
    public function listar() {
        try{
            $contatos = $this->entityManager->getRepository(Contato::class)->findAll();
            require __DIR__ . '/../view/contato/listarContatos.php';
        }catch (\Throwable $t) {
            echo "Erro ao listar contatos: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao listar contatos: " . $e->getMessage();
        }
    }

    /**
     * Adiciona um novo contato
     * @param array $dados
     */
    public function criar(array $dados = []) {
        try{
            if ($dados) {
                /** @var Pessoa $pessoa */
                $pessoa = $this->entityManager->find(Pessoa::class, $dados['idPessoa']);
                if (!$pessoa) {
                    echo "Pessoa não encontrada!";
                    return;
                }
    
                /** @var Contato $contato */
                $contato = new Contato();
                $contato->setTipo($dados["tipo"]);
                $contato->setDescricao($dados['descricao']);
                $contato->setPessoa($pessoa);
    
                $this->entityManager->persist($contato);
                $this->entityManager->flush();
    
                header('Location: /listarContatos');
                exit;
            }
    
            $tiposContato = Contato::TIPOS_VALIDOS;
            $listaPessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
            require __DIR__ . '/../view/contato/inserirContato.php';
        } catch (\Throwable $t) {
            echo "Erro ao criar contato: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao criar contato: " . $e->getMessage();
        }
    }

    /**
     * Altera um contato existente
     * @param int $id
     * @param array $dados
     */
    public function editar($id, array $dados = null) {
        try {
            /** @var Contato $contato */
            $contato = $this->entityManager->find(Contato::class, $id);
            if (!$contato) {
                echo "Contato não encontrado!";
                return;
            }

            if ($dados) {
                /** @var Pessoa $pessoa */
                $pessoa = $this->entityManager->find(Pessoa::class, $dados['idPessoa']);
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

            $listaPessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
            require __DIR__ . '/../view/contato/editarContato.php';
        } catch (\Throwable $t) {
            echo "Erro ao editar contato: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao editar contato: " . $e->getMessage();
        }
    }

    /**
     * Remove um contato existente
     * @param int $id
     */
    public function excluir($id) {
        try {
            /** @var Contato $contato */
            $contato = $this->entityManager->find(Contato::class, $id);
            if (!$contato) {
                echo "Contato não encontrado!";
                return;
            }

            $this->entityManager->remove($contato);
            $this->entityManager->flush();

            header('Location: /listarContatos');
            exit;
        } catch (\Throwable $t) {
            echo "Erro ao excluir contato: " . $t->getMessage();
        } catch (\Exception $e) {
            echo "Erro ao excluir contato: " . $e->getMessage();
        }
    }
}