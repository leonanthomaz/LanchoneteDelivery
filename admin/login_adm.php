<?php include("./connect_adm.php"); ?>

<?php include("../Views/header.php"); ?>

<body class="d-flex h-100 text-center text-white bg-dark">
        
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

<div class="container">
    <div class="col-sm">
        <div class="col">
        <h3>Atenção! Esta é uma área restrita!</h3>
        <div id="emailHelp" class="form-text">Entre apenas se você for um administrador...</div>
        <form method="POST" action="./connect_adm.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Usuário</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
           
            <input type="submit" class="btn btn-primary" value="entrar"/>
        </form>
        </div>
    </div>
</div>


       
    
<?php include("../Views/footer.php"); ?>