<?php
session_start();
ob_start();
include_once '../db/config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../lib/vendor/autoload.php';
$mail = new PHPMailer(true);

?>

<?php include("../Views/header.php"); ?>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        //var_dump($dados);
        $query_usuario = "SELECT id, username, email 
                    FROM users 
                    WHERE email =:email  
                    LIMIT 1";
        $result_usuario = $pdo->prepare($query_usuario);
        $result_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $result_usuario->execute();

        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
            //echo "Chave $chave_recuperar_senha <br>";

            $query_up_usuario = "UPDATE users 
                        SET recuperar_senha =:recuperar_senha 
                        WHERE id =:id 
                        LIMIT 1";
            $result_up_usuario = $pdo->prepare($query_up_usuario);
            $result_up_usuario->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_up_usuario->bindParam(':id', $row_usuario['id'], PDO::PARAM_INT);

            if ($result_up_usuario->execute()) {
                $link = "http://localhost/Sites/testeloja.v6/login/reset-password.php?chave=$chave_recuperar_senha";

                try {
                    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'leonanthomaz.projetos@gmail.com';
                    $mail->Password   = 'leonan2knet';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    $mail->setFrom('leonanthomaz.projetos@gmail.com', 'Atendimento');
                    $mail->addAddress($row_usuario['email'], $row_usuario['username']);

                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $row_usuario['username'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $mail->AltBody = 'Prezado(a) ' . $row_usuario['username'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();

                    $_SESSION['msg'] = "<h3 style='color: green'>Enviado e-mail com instruções para recuperar a senha. Acesse a sua caixa de e-mail para recuperar a senha!</h3>";
                    header("Location: ./recuperar_senha.php");
                } catch (Exception $e) {
                    echo "Oops! E-mail não enviado! Tente novamente. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }
        } else {
            echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
        }
    }

    if (isset($_SESSION['msg_rec'])) {
        echo $_SESSION['msg_rec'];
        unset($_SESSION['msg_rec']);
    }

    ?>
<div class="container">
    <div class="col-sm">
        <div class="col">
            <h2>Recuperar Senha</h2>
            <form method="POST" action="">
                <?php
                $usuario = "";
                if (isset($dados['email'])) {
                    $usuario = $dados['email'];
                } ?>

                <label>E-mail</label>
                <input type="text" name="email" placeholder="Digite o usuário" value="<?php echo $usuario; ?>"><br>
               
                <input type="submit" value="Recuperar" name="SendRecupSenha" class="btn btn-primary">
            </form>

                <br>

            <p>Lembrou? <a href="./login.php"> clique aqui</a>  para logar</p>

        </div>
    </div>
</div>

<?php include("../Views/footer.php"); ?>