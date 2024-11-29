<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contato')]
class Contato
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private $id;

    #[ORM\Column(type: 'string', length:20)]
    private $tipo;

    #[ORM\Column(type: 'string', length: 255)]
    private $descricao;

    #[ORM\ManyToOne(targetEntity: \Model\Pessoa::class, inversedBy:'contatos')]
    #[ORM\JoinColumn(name:'pessoa_id', referencedColumnName:'id', nullable: false)]
    private $pessoa;

    /**
     * Define os tipos permitidos para contato.
     */
    public const TIPOS_VALIDOS = [1 => 'Telefone', 2 => 'E-mail'];

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of tipo
     * @return int
     */ 
    public function getTipo()
    {
        return intval($this->tipo);
    }

    public function getTipoDescricao()
    {
        return isset(self::TIPOS_VALIDOS[$this->getTipo()]) ? self::TIPOS_VALIDOS[$this->getTipo()] : '';
    }

    public function setTipo(string $tipo) {
        if (!array_key_exists($tipo, self::TIPOS_VALIDOS)) {
            throw new \InvalidArgumentException('Tipo de contato inválido. Deve ser "Telefone" ou "Email".');
        }
        $this->tipo = $tipo;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Get the value of pessoa
     */ 
    public function getPessoa()
    {
        return $this->pessoa;
    }

    /**
     * Set the value of pessoa
     *
     * @return  self
     */ 
    public function setPessoa($pessoa)
    {
        $this->pessoa = $pessoa;
        return $this;
    }
}
