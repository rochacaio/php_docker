<?php

// Controllers/PersonagensController.php

require_once __DIR__ . '/../Services/PersonagensService.php';
class PersonagensController{

    private $urlApi;

    public function __construct($urlApi)
    {
        $this->urlApi = $urlApi;
    }

    public function listagemPersonagens(){
        $personagens = new PersonagensService();

        $dadosPersonagens = $personagens->getPersonagensLista($this->urlApi);

        if(! empty($dadosPersonagens)) {
            include __DIR__ . '/../Views/PersonagensList.php';
        }else{
            return null;
        }
    }
}