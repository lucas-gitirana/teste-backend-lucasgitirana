<!DOCTYPE html>
<html>

<head>
    <title>Lista de Contatos</title>
    <link rel="stylesheet" href="../../../public/styles.css">
    <link rel="stylesheet" href="../../../public/listarPessoas.css">
    <link rel="stylesheet" href="../../../public/listarContatos.css">
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
        <section class="lista-contatos">
            <h1><i class="fa-regular fa-address-book"></i> Gerenciar Contatos</h1>
            <button class="btnPadrao addContato" onclick="window.location.href='/inserirContato'"><i
                    class="fa-solid fa-plus"></i>Novo Contato</button>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Pessoa</th>
                    <th>Ações</th>
                </tr>
                <?php foreach ($contatos as $contato): ?>
                    <tr>
                        <td><?= $contato->getId() ?></td>
                        <td><?= $contato->getTipoDescricao() ?></td>
                        <td><?= $contato->getDescricao() ?></td>
                        <td><?= $contato->getPessoa()->getNome() ?></td>
                        <td class="acoes">
                            <button class="btnPadrao"
                                onclick="window.location.href='/editarContato?idContato=<?= $contato->getId() ?>'"><i
                                    class="fa-solid fa-pencil"></i>Editar</button>
                            <button class="btnPadrao"
                                onclick="window.location.href='/excluirContato?idContato=<?= $contato->getId() ?>'"><i
                                    class="fa-solid fa-trash"></i></i>Excluir</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>
</body>

</html>