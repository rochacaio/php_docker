<?php

class PersonagensService
{
    private $localDados;

    public function __construct($localDados)
    {
        $this->localDados = $localDados;
    }


    public function getPersonagensLista(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->localDados);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        // Retorna os dados em formato de array
        return json_decode($response);
    }
}