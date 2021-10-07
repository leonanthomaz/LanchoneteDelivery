<?php include("../login/connect.php"); ?>

<?php include("../Views/header.php"); ?>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
 

   
<?php 
if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
}

?>
<div class="container">
    <div class="col-sm">
    <div class="col">
        <h2>Login</h2>
        <p>Por favor, preencha os campos para fazer o login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Entrar">
            </div><br>
            
            <p>Não tem uma conta? <br><a href="../login/register.php" class="btn btn-primary">Inscreva-se agora</a></p>
            <p>Esqueceu a senha?<br><a href="../login/recuperar_senha.php" class="btn btn-warning">Clique aqui para recuperar</a></p>
                
            </form>
        </div>
    </div>
</div>
       
    </div>    
<?php include("../Views/footer.php"); ?>