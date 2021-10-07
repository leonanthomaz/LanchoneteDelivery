<?php include("../Views/header.php"); ?>

<?php 

session_start();

require_once "../db/config.php";
if(isset($_SESSION["username"]) && is_array($_SESSION["username"])){

    $adm  = $_SESSION["username"][1];
    $nome = $_SESSION["username"][0];
}else{
    echo "<script>window.location = 'index.html'</script>";
}
?>

<div class="container">
    <div><h2>Histórico de Pedidos:</h2></div><br>
    <div>
    <p><a class="btn btn-primary" href="./dashboard.php" class="card-link">Voltar ao Dashboard</a></p>
    <p><a class="btn btn-primary" href="./dash_users.php" class="card-link">Total de Usuarios Cadastrados</a></p>
    <a a class="btn btn-primary" href="./pedidos.php">pedidos</a>
    <a a class="btn btn-primary" href="../login/logout.php">Sair</a>
  </div><br>
  <div><h2>Pedidos:</h2></div><br>

<?php

require_once "../db/config.php";



function getPedidos($pdo) {
	$sql = "SELECT * FROM pedidos ORDER BY id DESC";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);   
}



/*

function PegarIDUsuario($pdo) {
	$sql = "SELECT usuario FROM pedidos";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);   
}

function PegarIDProduto($pdo) {
	$sql = "SELECT nome,usuario FROM pedidos WHERE id_usuario";
	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll(PDO::FETCH_ASSOC);   
}

*/




$resultadoPedidos = getPedidos($pdo);
    //var_dump($resultadoPedidos);

/*
$resultadoUsuarios = PegarIDUsuario($pdo);
$resultadoProdutos = PegarIDProduto($pdo);
*/

foreach($resultadoPedidos as $pedido){
    //var_dump($pedido);

  $pedidos[] = array(
      'IdCompra' => $pedido['id'],
      'IdCliente' => $pedido['id_usuario'],
      'IdProduto' => $pedido['id_produto'],
      'Usuario' => $pedido['usuario'],
      'Preco' => $pedido['preco'],
      'Nome' => $pedido['nome'],
      'Quantidade' => $pedido['quantidade'],        
      'Total' => $pedido['total'],
      'DTPedido' => $pedido['dt_pedido'],
    );

  echo '

  <div class="col">
  <div class="card-dark">
        
    <tr>
    <div>Cliente: '.$pedido['usuario'].'</div>
    <div>Pedido Nº: '.$pedido['id'].'</div>
    <div>Produto adquirido: '.$pedido['nome'].'</div>
    <div>Quantidade: '.$pedido['quantidade'].'</div>
    <div>Preço unitário: R$ '.$pedido['preco'].',00</div>
    <div>Subtotal: R$'.$pedido['total'].',00</div>
    <div>Data e Hora da Compra: '.date('d/m/Y H:i:s', strtotime($pedido['dt_pedido'])).'</div>
    <tr/>
    --
    
    </div>
    </div>
        
          
        ';


   //<div>Subtotal: R$'.$pedido['total'].',00</div>
    //<div>Data e Hora da Compra: '.date('d/m/Y H:i:s', strtotime($pedido['dt_pedido'])).'</div>


 //var_dump($resultadoPedidos);



}

/*

foreach($resultadoUsuarios as $usuario){
  //var_dump($pedido);

  $usuarios[] = array(
      'USERUSER' => $usuario['usuario'],
      
  );

    echo '

    <div class="col">
    <div class="card-dark">
          
      <tr>
      
      <tr/>
      
      </div>
      </div>
          
            
          ';
}

foreach($resultadoProdutos as $produto){
  //var_dump($pedido);

  $produtos[] = array(

      'Product' => $produto['nome'],
      'USERUSER' => $produto['usuario'],

  );

    echo '

    <div class="col">
    <div class="card-dark">
          
      <tr>
      
      <tr/>
            <div>'.$produto['usuario'].'</div>

      <div>'.$produto['nome'].'</div>


      
      </div>
      </div>
          
            
          ';
}

*/

?>

  <div>
  <p><a class="btn btn-primary" href="./dashboard.php" class="card-link">Voltar ao Dashboard</a></p>
    <p><a class="btn btn-primary" href="./dash_users.php" class="card-link">Total de Usuarios Cadastrados</a></p>
    <a a class="btn btn-primary" href="./pedidos.php">pedidos</a>
    <a a class="btn btn-primary" href="../login/logout.php">Sair</a>
  </div>

<?php include("../Views/footer.php"); ?>







