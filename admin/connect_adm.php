<?php
    require("../db/config.php");

    if(isset($_POST["username"]) && isset($_POST["password"]) && $pdo != null){
        $sql = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $sql->execute(array($_POST["username"], $_POST["password"]));

        if($sql->rowCount()){
            $user = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["username"] = array($user["nome"], $user["adm"]);

            echo "<script>window.location = '../admin/dashboard.php'</script>";
        }else{
            echo "<script>window.location = '../index.php'</script>";
        }
    }
?>