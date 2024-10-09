<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H_share</title>
</head>
<body>

    <?php
    //verificar se o arquivo foi carregado
    if (isset($_FILES['file'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "O arquivo ". htmlspecialchars(basename($_FILES["file"]["name"])). " foi enviado com sucesso.";
        } else {
            echo "Desculpe, houve um erro ao enviar o arquivo.";
        }
    }

    var_dump($_FILES);
    ?>

</body>
</html>