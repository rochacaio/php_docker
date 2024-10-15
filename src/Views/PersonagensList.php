<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Página de controle de Personagens">
    <meta name="author" content="Caio Rocha">
    <title>Lista de Personagens</title>
</head>
<body>
<header>
    <h1>Bem-vindo ao controle de personagens</h1>
</header>
<div>
<table border='2'>
    <tr><th>Nome</th><th>Altura(cm)</th><th>Peso(kg)</th><th>Links de filmes</th></tr>
    <?php foreach ($dadosPersonagens->results as $item) { ?>
        <tr>
            <td> <?php echo $item->name; ?>  </td>
            <td> <?php echo $item->height; ?>  </td>
            <td> <?php echo $item->mass; ?> </td>
            <td> <?php echo $item->filmesString; ?> </td>
        </tr>
    <?php } ?>
</table>
</div>
<footer>
    <p>&copy; 2024 Caio Rocha. Todos os direitos reservados.</p>
</footer>
</body>
</html>
