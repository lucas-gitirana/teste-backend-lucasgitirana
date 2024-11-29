<!DOCTYPE html>
<html>

<head>
    <title>Editar Pessoa</title>
</head>

<body>
    <h1>Editar Pessoa</h1>
    <form action="/editarPessoa?id=<?= $pessoa->getId() ?>" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?= $pessoa->getNome() ?>" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" value="<?= $pessoa->getCpf() ?>" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
    <a href="/listarPessoas">Voltar</a>
</body>

</html>