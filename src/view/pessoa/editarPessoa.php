<!DOCTYPE html>
<html>

<head>
    <title>Editar Pessoa</title>
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

        <div class="cadastro">
            <h1><i class="fas fa-user"></i> Editar Pessoa</h1>
            <form action="/editarPessoa?id=<?= $pessoa->getId() ?>" method="POST">
                <label for="idPessoa">Id:</label>
                <input type="text" name="idPessoa" id="idPessoa" value="<?= $pessoa->getId() ?>" disabled>
                <br>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" value="<?= $pessoa->getNome() ?>" required>
                <br>
                <label for="cpf">CPF:</label>
                <input type="text" name="cpf" id="cpf" value="<?= $pessoa->getCpf() ?>" maxlength="14"
                    placeholder="000.000.000-00" oninput="aplicarMascaraCPF(this)" required>
                <br>
                <button class="btnPadrao" type="submit">Salvar</button>
            </form>
            <a href="/listarPessoas">Voltar</a>
        </div>
    </div>

    <script>
        function aplicarMascaraCPF(input) {
            let valor = input.value;
            valor = valor.replace(/\D/g, "");

            // Adiciona a máscara
            if (valor.length <= 3) {
                valor = valor.replace(/(\d{3})/, "$1");
            } else if (valor.length <= 6) {
                valor = valor.replace(/(\d{3})(\d+)/, "$1.$2");
            } else if (valor.length <= 9) {
                valor = valor.replace(/(\d{3})(\d{3})(\d+)/, "$1.$2.$3");
            } else {
                valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
            }

            // Atualiza o valor do campo
            input.value = valor;
        }
    </script>
</body>

</html>