<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pessoas</title>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    <a href="/inserirPessoa">Nova Pessoa</a>
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
            <td>
                <a href="/editarPessoa?id=<?= $pessoa->getId() ?>">Editar</a>
                <a href="/excluirPessoa?id=<?= $pessoa->getId() ?>" onclick="return confirm('Tem certeza que deseja excluir esta pessoa?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
