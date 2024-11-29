<!DOCTYPE html>
<html>

<head>
    <title>Editar Contato</title>
</head>

<body>
    <h1>Editar Contato</h1>
    <form action="/editarContato?idContato=<?= $contato->getId() ?>" method="POST">
        <label for="idContato">ID:</label>
        <input type="text" name="idContato" id="idContato" value=<?= $contato->getId() ?> disabled>
        <br>
        <label for="nome">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <?php foreach ($contato::TIPOS_VALIDOS as $key => $tipo): ?>
                <option value=<?= $key ?>     <?= $contato->getTipo() == $key ? 'selected' : '' ?>><?= $tipo ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value=<?= $contato->getDescricao() ?> required>
        <br>
        <label for="idPessoa">Pessoa:</label>
        <select name="idPessoa" id="idPessoa" value=<?= $contato->getPessoa()->getId() ?>>
            <?php foreach ($listaPessoas as $pessoa): ?>
                <option value=<?= $pessoa->getId() ?>     <?= ($contato->getPessoa()->getId() == $pessoa->getId()) ? 'selected' : '' ?>><?= $pessoa->getNome() ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>

</html>