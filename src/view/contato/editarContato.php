<!DOCTYPE html>
<html>

<head>
    <title>Editar Contato</title>
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

        <section class="cadastro">
            <h1><i class="fa-regular fa-address-book"></i> Editar Contato</h1>
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
                <button class="btnPadrao" type="submit">Salvar</button>
            </form>
            <a href="/listarContatos">Voltar</a>
        </section>
    </div>
</body>

</html>