# Sistema de Gerenciamento de Contatos

Este repositório contém a implementação de um sistema de gerenciamento de contatos desenvolvido como parte do processo seletivo para Desenvolvedor Back-end na [Magazord](https://magazord.com.br). 

## Tecnologias Utilizadas
- **Linguagem Back-end**: PHP
- **ORM**: Doctrine
- **Banco de Dados**: PostgreSQL
- **Frontend**: JavaScript, HTML, CSS
- **Gerenciamento de Dependências**: Composer
- **Padrão de Arquitetura**: MVC
- **Ambiente de Desenvolvimento**: Docker

## Estrutura do Projeto

1. Diretórios:
   ```bash
   src/
    ├── controller/     # Controladores
    ├── model/          # Entidades mapeadas pelo Doctrine
    ├── view/           # Arquivos HTML


---

## Instruções de Execução

### Configuração do ambiente Docker
1. Certifique-se de ter o **Docker** e o **Docker Compose** instalados.
2. Clone o repositório:
   ```bash
   git clone [<link-do-repositorio>](https://github.com/lucas-gitirana/teste-backend-lucasgitirana.git)
   cd teste-backend-lucasgitirana
3. Inicie os contêiners:
   ```bash
   docker-compose up -d
4. Acesse o contêiner do PHP (se necessário):
   ```bash
   docker exec -it php_app bash

### Como Usar
1. Acesse o sistema no navegador:
   ```bash
   http://localhost:<porta>
2. Navegue pelas seguintes funcionalidades:
- **Listar Pessoas**: Página inicial com campo de pesquisa.
- **Cadastrar Pessoa**: Inclua um novo registro de pessoa.
- **Editar Pessoa**: Altere as informações de uma pessoa.
- **Excluir Pessoa**: Remova uma pessoa dos registros salvos.  
- **Listar Contatos**: Página com a lista de contatos do sistema.
- **Cadastrar Contato**: Crie um novo contato relacionado a uma pessoa cadastrada no sistema.
- **Editar Contato**: Altere as informações de um contato.
- **Excluir Contato**: Remova um contato dos registros salvos.

### Imagens
![image](https://github.com/user-attachments/assets/38e75d82-e76d-4782-9833-7c1a941573de)


![image](https://github.com/user-attachments/assets/5e02dc7f-87d0-4853-a97a-1a1c6a2f9923)


### Considerações Finais
Para quaisquer dúvidas sobre o projeto entre em contato.  
E-mail: gitiranalucas5@gmail.com  
Lucas Emanoel Gitirana
