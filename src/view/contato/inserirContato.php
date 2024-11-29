<!DOCTYPE html>
<html>

<head>
    <title>Criar Contato</title>
</head>

<body>
    <h1>Criar Contato</h1>
    <form action="/inserirContato" method="POST">
        <label for="nome">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option>Selecione...</option>
            <?php foreach ($tiposContato as $key => $tipo): ?>
                <option value=<?= $key ?>><?= $tipo ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required>
        <br>
        <label for="idPessoa">Pessoa:</label>
        <select name="idPessoa" id="idPessoa">
            <option>Selecione...</option>
            <?php foreach ($listaPessoas as $pessoa): ?>
                <option value=<?= $pessoa->getId() ?>><?= $pessoa->getNome() ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>