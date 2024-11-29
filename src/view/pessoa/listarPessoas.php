<!DOCTYPE html>
<html>

<head>
    <title>Pessoas</title>
    <link rel="stylesheet" href="../../../public/styles.css">
    <link rel="stylesheet" href="../../../public/listarPessoas.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <nav class="menu">
            <ul>
                <li><a href="/listarPessoas"><i class="fas fa-user"></i>Pessoas</a></li>
                <li><a href="/listarContatos"><i class="fa-regular fa-address-book"></i>Contatos</a></li>
            </ul>
        </nav>

        <section class="lista-pessoas">
            <div class="lista-pessoas__cabecalho">
                <h1><i class="fas fa-user"></i> Gerenciar Pessoas</h1>
                <div class="lista-pessoas__area-pesquisa">
                    <form action="/buscarPessoa" method="GET">
                        <input type="text" name="termo" placeholder="Informe o nome ou o CPF da pessoa">
                        <button class="btnPesquisar" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>
                    <button class="btnPadrao" onclick="window.location.href='/inserirPessoa'"><i
                            class="fa-solid fa-plus"></i>Nova Pessoa</button>
                </div>
            </div>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?= $pessoa->getId() ?></td>
                        <td><?= $pessoa->getNome() ?></td>
                        <td><?= $pessoa->getCpf() ?></td>
                        <td class="acoes">
                            <button class="btnPadrao"
                                onclick="window.location.href='/editarPessoa?id=<?= $pessoa->getId() ?>'"><i
                                    class="fa-solid fa-pencil"></i>Editar</button>
                            <button class="btnPadrao"
                                onclick="window.location.href='/excluirPessoa?id=<?= $pessoa->getId() ?>'"><i
                                    class="fa-solid fa-trash"></i></i>Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
</body>

</html>