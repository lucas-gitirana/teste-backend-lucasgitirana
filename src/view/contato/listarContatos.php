<!DOCTYPE html>
<html>

<head>
    <title>Lista de Contatos</title>
</head>

<body>
    <h1>Lista de Contatos</h1>
    <a href="/inserirContato">Novo Contato</a>
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
                <td>
                    <a href="/editarContato?idContato=<?= $contato->getId() ?>">Editar</a>
                    <a href="/excluirContato?idContato=<?= $contato->getId() ?>"
                        onclick="return confirm('Tem certeza que deseja excluir este contato?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>