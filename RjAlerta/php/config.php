<?php 
   $dbHost = 'Localhost' ;
   $dbUsername = 'root' ;
   $dbPassword = '';
   $dbName = 'rjalerta_db';

   $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
   // Configuração do DSN (Data Source Name)
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4";

// Opções da conexão
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Cria a instância do objeto PDO para a conexão com o banco de dados
    $conn = new PDO($dsn, $dbUsername, $dbPassword, $options);

    // Pronto! A conexão foi estabelecida com sucesso.
    // Você pode utilizar a variável $conn para executar consultas no banco de dados.
} catch (PDOException $e) {
    // Ocorreu um erro ao tentar conectar-se ao banco de dados.
    // Você pode tratar o erro de acordo com a sua necessidade.
    echo "Erro de conexão: " . $e->getMessage();
}

   // $conn= new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

   // if($conn -> connect_errno){
     //   echo "erro";
    //}
    //else{
   //echo "conexao efetuada com sucesso";
    //}

    // Fechar a conexão com o banco de dados

?>