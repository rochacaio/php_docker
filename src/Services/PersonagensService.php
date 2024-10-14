<?php

class PersonagensService
{

    public function getPersonagensLista($localDados){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $localDados);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        // Retorna os dados em formato de array
        $dados = json_decode($response);

        foreach ($dados->results as $item) {
            $string_links = '<ol></ol>';
            foreach ($item->films as $i => $links) {
                $i++;
                $string_links .= "<li> <a href='" . $links . "'> Link filme " . $i . " </a></li><br>";
            }
            $string_links .= '</ol>';
            $item->filmesString = str_replace('"', '', $string_links);
        }
            return $dados;
    }
}