<!DOCTYPE html>
<html>
<head>
    <title>Criar Pessoa</title>
</head>
<body>
    <h1>Criar Pessoa</h1>
    <form action="/inserirPessoa" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <br>
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>
