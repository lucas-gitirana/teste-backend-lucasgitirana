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

    #[ORM\OneToMany(mappedBy:'pessoa', targetEntity: Contato::class, cascade: ['persist', 'remove'])]
    private $contatos;

    public function __construct() {
        $this->contatos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @return  self
     */ 
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of contatos
     */ 
    public function getContatos()
    {
        return $this->contatos;
    }

    public function addContato(Contato $contato)
    {
        $this->contatos[] = $contato;
        $contato->setPessoa($this);
    }

    public function removeContato(Contato $contato)
    {
        $this->contatos->removeElement($contato);
    }
}