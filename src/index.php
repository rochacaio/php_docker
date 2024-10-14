<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'Services/PersonagensService.php';
// URL da API externa

// Busca os dados
$personagens = new PersonagensService("https://swapi.dev/api/people/");

$data = $personagens->getPersonagensLista();

// Exibição dos dados em uma tabela
if (!empty($data)) {
    echo "<table border='1'>";
    echo "<tr><th>Nome</th><th>Altura</th><th>Mass</th><th>Links de filmes</th></tr>";
    foreach ($data->results as $item) {
        $string_links = "<td><ol></ol>";
        foreach ($item->films as $i => $links){
            $i++;
            $string_links.= "<li> <a href='" . $links . "'> Link filme " . $i . " </a></li><br>";
        }
        $string_links.= "</ol></td>";
        echo "<tr>";
        echo "<td>" . $item->name . "</td>";
        echo "<td>" . $item->height . "</td>";
        echo "<td>" . $item->mass . "</td>";
        echo  $string_links;
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum dado encontrado.";
}

?>
