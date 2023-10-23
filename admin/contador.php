<?php
    $arquivo = 'contador.txt';

    // Verifique se o arquivo existe, se não, crie um novo arquivo
    if (!file_exists($arquivo)) {
        $contador = 0;
        file_put_contents($arquivo, $contador);
    }

    // Leia o contador atual do arquivo
    $contador = file_get_contents($arquivo);

    // Adicione 1 ao contador
    $contador++;

    // Escreva o novo valor do contador de volta no arquivo
    file_put_contents($arquivo, $contador);
?>