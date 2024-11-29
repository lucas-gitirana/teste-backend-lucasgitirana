<?php

namespace Model;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contato')]
class Contato {
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $tipo;

    #[ORM\Column(type: 'string', length: 255)]
    private $descricao;

    #[ORM\ManyToOne(targetEntity: \Model\Pessoa::class, inversedBy: 'contatos')]
    #[ORM\JoinColumn(name: 'pessoa_id', referencedColumnName: 'id', nullable: false)]
    private $pessoa;

    // Definição dos tipos de contato válidos
    public const TIPOS_VALIDOS = [1 => 'Telefone', 2 => 'E-mail'];

    /**
     * Retorna o Id do contato
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Retorna o Tipo do contato
     * @return int
     */
    public function getTipo() {
        return intval($this->tipo);
    }

    /**
     * Retorna a Descrição do Tipo do contato
     * @return string
     */
    public function getTipoDescricao() {
        return isset(self::TIPOS_VALIDOS[$this->getTipo()]) ? self::TIPOS_VALIDOS[$this->getTipo()] : '';
    }

    /**
     * Define o Tipo do contato
     * @param int $tipo
     * @return Contato
     */
    public function setTipo($tipo) {
        if (!array_key_exists($tipo, self::TIPOS_VALIDOS)) {
            throw new \InvalidArgumentException('Tipo de contato inválido. Deve ser "Telefone" ou "Email".');
        }
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * Retorna a Descrição do contato
     * @return string
     */
    public function getDescricao() {
        return $this->descricao;
    }

    /**
     * Define a Descrição do contato
     * @param string $descricao
     * @return Contato
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    /**
     * Retorna a Pessoa vinculada ao contato
     * @return Pessoa
     */
    public function getPessoa() {
        return $this->pessoa;
    }

    /**
     * Define a Pessoa vinculada ao contato
     * @param Pessoa $pessoa
     * @return Contato
     */
    public function setPessoa($pessoa) {
        $this->pessoa = $pessoa;
        return $this;
    }
}
