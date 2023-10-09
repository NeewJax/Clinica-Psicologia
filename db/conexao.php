
<?php
// CONFIGURAÇÕES GERAIS
$servidor="localhost";
$usuario="root";
$senha="";
$banco="db_psicologia";
//ti1234

// CONEXÃO
try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $erro) {
    // Registre o erro em um arquivo de log ou sistema de monitoramento
    error_log("Erro na conexão com o banco: " . $erro->getMessage(), 0);
    echo "Ocorreu um erro ao se conectar com o banco de dados.";
}



date_default_timezone_set ("America/Sao_Paulo");

?>