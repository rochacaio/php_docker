<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// URL da API externa
$apiUrl = "https://swapi.dev/api/people/";

// Função para buscar dados da API
function fetchDataFromAPI($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);

    // Retorna os dados em formato de array
    return json_decode($response);
}

// Busca os dados
$data = fetchDataFromAPI($apiUrl);

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
