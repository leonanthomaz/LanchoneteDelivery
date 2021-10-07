<?php
session_start();
//var_dump($_SESSION['dados']);


include("../Views/header.php"); 


require_once "../db/config.php";

foreach($_SESSION['dados'] as $result){
	$stmt = $pdo->prepare("INSERT INTO pedidos (id, id_usuario, id_produto, usuario, nome, quantidade, preco, total, dt_pedido) VALUES (NULL, ?, ?, ?,?,?,?,?, NOW())");
    $stmt->bindParam(1,$result['IDCliente']);
    $stmt->bindParam(2,$result['idProduto']);
    $stmt->bindParam(3,$result['Usuario']);
    $stmt->bindParam(4,$result['Nome']);
    $stmt->bindParam(5,$result['Quantidade']);
    $stmt->bindParam(6,$result['Preco']);
    $stmt->bindParam(7,$result['Total']);
	$stmt->execute();
    
}

if(isset($_SESSION['dados'])):

echo'

<div class="container">
	<!-- Bloco Header do carrinho -->
	  <div class="card mt-5">
			<div class="card-body">
        <div class="finalizado_com_sucesso">
        <h2>Compra finalizada com sucesso!</h2>
        <p<b>Obrigado por escolher a <a href="./index.php">Delícias do Alto</a>!</b></p><br>
        <h4>Clique <a class="btn btn-primary" href="../index.php">aqui</a> para voltar ao menu principal <br>   
      </div>
    </div>
</div>';


endif;
/*
unset($_SESSION['dados']);

 
// Remova todas as variáveis de sessão
$_SESSION = array();
 

exit;
*/
?>

<?php include("../Views/footer.php"); ?>