<?php
// Inicialize a sessão
session_start();

 
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
 <?php include("./Views/header.php"); ?>

  <link rel="stylesheet" type="text/css" href="./css/styles.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/styles.css">




  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./Views/assets/chef-toque-gc901081a4_1280.png" width="50"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./login/login.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./carrinho/carrinho.php">Carrinho</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./login/logout.php" id="comentario">Sair</a>
            </li>
            
            <li class="nav-item">
            </li>
          </ul>
        </div>
      </div>
  </nav>


    <div class="container">
        <div class="col-sm">
          <div class="img-card"><br><br>
          <div class="float-right">
          <h1>Delícias do Alto</h1>  
          <a class="nav-link disabled">
            <span class="material-icons">
            account_circle
          <a class="nav-link disabled" href="">Oi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bem vindo ao nosso site.</a></a><br><br>
          </span>
          </div><br>
          <img src="./Views/assets/chef-toque-gc901081a4_1280.png" width="250"/><br><br>
               
        </div>
      </div>
    </div>

    <?php 	
    require_once "./carrinho/functions/product.php";
    require_once "./db/config.php";
    $products = getProducts($pdo);
    ?>
    
  <?php foreach($products as $product) : ?>

  <div class="container">
    <div class="card">
      <div class="col">
        <div class="">
        <div class="float-right">
        <img src="<?php echo $product['imagem']?>" width="300"/>	
        </div><br>
        </div>
        <div class="col-sm">
        <h4 class="card-title"><?php echo $product['nome']?></h4>
        </div>
        <div class="card-sm"><p><i><?php echo $product['descricao']?></i></p></div>
        <div class="col-sm">
        <div><h5>R$<?php echo number_format($product['preco'], 2, ',', '.')?></h5></div>
        </div>
        <div class="col-sm">
        <p><a class="btn btn-primary" href="./carrinho/carrinho.php?acao=add&id=<?php echo $product['id']?>" class="card-link">Comprar</a></p>
        </div>
      </div>
    </div>
  </div>

  <?php endforeach;?>


<?php include("./Views/footer.php"); ?>