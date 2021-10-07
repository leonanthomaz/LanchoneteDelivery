<?php include("./Views/header.php"); ?>
<script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="./Views/assets/chef-toque-gc901081a4_1280.png" width="50"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"> <h3>Delícias do Alto</h3>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./login/login.php">Login</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./login/register.php">Cadastrar</a>
            </li>
            <li class="nav-item">
            </li>
          </ul>
        </div>
      </div>
</nav>

  <div class="container">
      <div class="row">
        <h3>Bem vindo! Faça login para continuar clicando <a href="./login/login.php" class="btn btn-warning">aqui</a></h3>
      </div>
  </div>


<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner" >
    <div class="carousel-item active">
      <img src="./Views/assets/bolo-de-chocolate.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./Views/assets/cupcakes.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="./Views/assets/pave.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
 
</div>



<script src="../js/script.js"></script>

<span class="material-icons">
network_locked
</span>
<p><a class="btn btn-dark" href="./admin/login_adm.php" class="card-link">Área Restrita</a></p>
<?php include("./Views/footer.php"); ?>