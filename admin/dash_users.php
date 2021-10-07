<?php include("../Views/header.php"); ?>

<div class="container">
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

<div class="col"> 
<h2>Bloco total de usuários cadastrados no sistema:</h2>

    <?php if($adm): ?>

    <?php
        $sql = $pdo->prepare("SELECT * FROM users");
        $sql->execute();

        $users = $sql->fetchAll(PDO::FETCH_ASSOC);

        for($i = 0; $i < sizeof($users); $i++):
            $usuarioAtual = $users[$i];
    ?>

    
<div class="card-responsive"><h3>Usuário:</h3>
    <div>
        <td>Usuário: <?php echo $usuarioAtual["username"]; ?></td><tr><br>
        <td>Senha: <?php echo $usuarioAtual["password"]; ?></td><br>
        <td>Usuário Administrador: <?php echo $usuarioAtual["adm"]; ?></td><br>
        <td>ID: <?php echo $usuarioAtual["id"]; ?></td>
    <div>
</div>
   <div>----------</div> 
</div>

    <?php endfor; ?>
    <?php endif; ?>
</div>

<div>
    <p><a class="btn btn-primary" href="./dashboard.php" class="card-link">Voltar ao Dashboard</a></p>
    <p><a class="btn btn-primary" href="./dash_users.php" class="card-link">Total de Usuarios Cadastrados</a></p>
    <a a class="btn btn-primary" href="./pedidos.php">Pedidos</a><br><br>
    <a a class="btn btn-danger" href="../login/logout.php">Sair</a>
</div>
<?php include("../Views/footer.php"); ?>