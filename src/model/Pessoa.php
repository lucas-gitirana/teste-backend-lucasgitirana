<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;
use Model\Contato;

#[ORM\Entity]
#[ORM\Table(name: 'pessoa')]
class Pessoa {

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private $id;

    #[ORM\Column(type: 'string')]
    private $nome;

    #[ORM\Column(type: 'string', unique: true)]
    private $cpf;

    #[ORM\OneToMany(mappedBy: 'pessoa', targetEntity: Contato::class, cascade: ['persist', 'remove'])]
    private $contatos;

    public function __construct() {
        $this->contatos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Retorna o Id da pessoa
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Retorna o Nome da pessoa
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Define o Nome da pessoa
     * @param string $nome
     * @return Pessoa
     */
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Retorna o CPF da pessoa
     * @return string
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * Define o CPF da pessoa
     * @param string $cpf
     * @return Pessoa
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * Retorna a lista de contatos da pessoa
     * @return array
     */
    public function getContatos() {
        return $this->contatos;
    }

    /**
     * Adiciona um contato à lista de contatos da pessoa
     * @param Contato $contato
     */
    public function addContato(Contato $contato) {
        $this->contatos[] = $contato;
        $contato->setPessoa($this);
    }

    /**
     * Remove um contato da lista de contatos da pessoa
     * @param Contato $contato
     */
    public function removeContato(Contato $contato) {
        $this->contatos->removeElement($contato);
    }
}