<?php
// Incluir arquivo de configuração
require_once "../db/config.php";

// Defina variáveis e inicialize com valores vazios
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

// Processando dados do formulário quando o formulário é enviado
if($_SERVER["REQUEST_METHOD"] == "POST"){
 

// Validar nome de usuário

if(empty(trim($_POST["username"]))){
    $username_err = "Por favor coloque um nome de usuário.";
} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
    $username_err = "O nome de usuário pode conter apenas letras, números e sublinhados.";
} else{
    // Prepare uma declaração selecionada
    $sql = ('UPDATE users SET username = :username');
    
    if($stmt = $pdo->prepare($sql)){
        // Vincule as variáveis à instrução preparada como parâmetros
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        
        // Definir parâmetros
        $param_username = trim($_POST["username"]);
        
        // Tente executar a declaração preparada
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                $username_err = "Este nome de usuário já está em uso.";
            } else{
                $username = trim($_POST["username"]);
            }
        } else{
            echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
        }

        echo "Tudo certo!";

        // Fechar declaração
        unset($stmt);

    }
}  

// Verifique os erros de entrada antes de inserir no banco de dados
if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
    // Prepare uma declaração de inserção
    $sql = ('UPDATE users SET username = :username');
     
    if($stmt = $pdo->prepare($sql)){
        // Vincule as variáveis à instrução preparada como parâmetros
        $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
        $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
        
        // Definir parâmetros
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        
        // Tente executar a declaração preparada
        if($stmt->execute()){
            // Redirecionar para a página de login
            header("location: login.php");
        } else{
            echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
        }

        echo "Tudo certo!";

        // Fechar declaração
        unset($stmt);
    }
}
}




?>
 
 <?php include("../Views/header.php"); ?>
 
    <div class="wrapper">
        <h2>Cadastro</h2>
        <p>Por favor, preencha este formulário para criar uma conta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Atualizar Conta">
                <input type="reset" class="btn btn-secondary ml-2" value="Apagar Dados">
            </div>
        </form>
    </div>    
<?php include("../Views/footer.php"); ?>