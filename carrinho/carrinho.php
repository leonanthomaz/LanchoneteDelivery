<?php 
session_start();
require_once "./functions/product.php";
require_once "./functions/cart.php";


require_once "../db/config.php";

if(isset($_GET['acao']) && in_array($_GET['acao'], array('add', 'del', 'up'))) {
	
	if($_GET['acao'] == 'add' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
		addCart($_GET['id'], 1);			
	}

	if($_GET['acao'] == 'del' && isset($_GET['id']) && preg_match("/^[0-9]+$/", $_GET['id'])){ 
		deleteCart($_GET['id']);
	}

	if($_GET['acao'] == 'up'){ 
		if(isset($_POST['prod']) && is_array($_POST['prod'])){ 
			foreach($_POST['prod'] as $id => $qtd){
					updateCart($id, $qtd);
			}
		}
	} 
	header('location: carrinho.php');
}

$resultsCarts = getContentCart($pdo);
$totalCarts  = getTotalCart($pdo);


?>


<?php include("../Views/header.php"); ?>

	
	<link rel="stylesheet" type="text/css" href="../css/styled.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />


<body>
<div class="container">
	<!-- Bloco Header do carrinho -->
	<div class="card mt-5">
			<div class="card-body">
			<img src="../Views/assets/chef-toque-gc901081a4_1280.png" class="float-right" width="70"/>
			<h4 class="card-title">Carrinho</h4>
			<h3><tr>
				<td colspan="3" class="text-right"><b>Total: </b></td>
				<td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></td>
				<td></td>
				</tr></h3>
				
			<a href="../painel.php">Lista de Produtos</a>
		</div>
	</div>

	<!-- Bloco Corpo do carrinho -->

	<?php if($resultsCarts) : ?>
	<form action="carrinho.php?acao=up" method="post">
	<?php 

		$_SESSION['dados'] = array();
		$usuario = $_SESSION['username'];
		$userid = $_SESSION['id'];

			
		foreach($resultsCarts as $result) : ?>
		<div class="container">
			<div class="card mt-5">
				<div class="card-body">
				<img src="<?php echo $result['IMG']?>" width="250"/><br><br>	
				<div><h3><b><?php echo $result['name']?></b></h3></div><br>	
				<p><i><?php echo $result['desc']?></i></p>
				<div class="number-input"><br>	
				<button onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
					<input type="number" min="0"  name="prod[<?php echo $result['id']?>]" value="<?php echo $result['quantity']?>" size="1" />
				<button onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
				</div>

				<div>Valor unitário: R$<?php echo number_format($result['price'], 2, ',', '.')?></div>
				<div>Subtotal: R$<?php echo number_format($result['subtotal'], 2, ',', '.')?></div>
				</td>
				</td>
				
				</td>

			<a href="carrinho.php?acao=del&id=<?php echo $result['id']?>" class="btn btn-danger">Remover</a></td>
				
			</div>
		</div>
	</div>
	<div class="card mt-5">
	<div><h4><b>Total: </b></td>R$<?php echo number_format($totalCarts, 2, ',', '.')?></b></h4></div>
	</div>
					
					
	<?php
	
	
	array_push(
	$_SESSION['dados'],
	array(
	'Usuario' => $usuario,
	"IDCliente" => $userid,
	'idProduto' =>  $result['id'],
	'Nome' =>  $result['name'],
	'Quantidade' =>  $result['quantity'],
	'Preco' =>  $result['price'],
	'Total' =>  $totalCarts,			
	)	
	);
	//var_dump($_SESSION['dados']);
	endforeach;?>
	
	<div class="card mt-5">
	<a class="btn btn-info" href="../painel.php">Continuar Comprando</a><br>
	<button class="btn btn-primary" type="submit">Atualizar Carrinho</button><br>
	<a class="btn btn-info" name="enviar" href="./finalizar_pedido.php">Finalizar</a>
	</div>

	</form>
	
	<?php endif?>
</div>

<script src="../js/script.js"></script>	
</body>
<?php include("../Views/footer.php"); ?>
