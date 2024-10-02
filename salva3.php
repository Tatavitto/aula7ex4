<?php
// conexao
$servidor = 'localhost';
$banco = 'receitas';
$usuario = 'root';
$senha = '';

$conexao = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);

echo "Conectado!<br>";

echo "Recebido: <br>";
echo $_GET['nome'];
echo "<br>";
echo $_GET['url'];
echo "<br>";
echo $_GET['descricao'];
echo "<br>";
echo $_GET['preco'];

$codigoSQL = "INSERT INTO `produto` (`id`, `nome`, `url`, `descricao`, `preco`) VALUES (NULL, :nm, :url, :desc, :prec)";

try {
    $comando = $conexao->prepare($codigoSQL);

    $resultado = $comando->execute(array('nm' => $_GET['nome'], 'url' => $_GET['url'], 'desc' => $_GET['descricao'], 'prec' => $_GET['preco']));

    if($resultado) {
	echo "Comando executado!";
    } else {
	echo "Erro ao executar o comando!";
    }
} catch (Exception $e) {
    echo "Erro $e";
}

$conexao = null;
?>