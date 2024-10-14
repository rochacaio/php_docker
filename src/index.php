<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'Controllers/PersonagensController.php';
// URL da API externa

// Busca os dados
$controlador = new PersonagensController("https://swapi.dev/api/people/");

$data = $controlador->listagemPersonagens();

?>
