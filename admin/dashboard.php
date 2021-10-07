

<?php include("./connect_adm.php"); ?>

<?php 

session_start();

require_once "../db/config.php";
if(isset($_SESSION["username"]) && is_array($_SESSION["username"])){

    $adm  = $_SESSION["username"][1];
    $nome = $_SESSION["username"][0];
}else{
    echo "<script>window.location = '../index.php'</script>";
}
?>

<?php include("../Views/header.php"); ?>

    


<div class="container">
    <div><h2>Painel de controle</h2></div><br>
    <div>
        <p><a class="btn btn-primary" href="./dash_users.php" class="card-link">Total de Usuarios Cadastrados</a></p>
        <a a class="btn btn-primary" href="./pedidos.php">Pedidos</a><br><br>
        <a a class="btn btn-danger" href="../login/logout.php">Sair</a>
    </div>
</div>

    


 
<?php include("../Views/footer.php"); ?>