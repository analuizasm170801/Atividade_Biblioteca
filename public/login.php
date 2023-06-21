<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #26979f;
    }
    
    .container {
      width: 500px;
      margin: 0 auto;
      margin-top: 100px;
      background-color: #fff;
      border-radius: 5px;
      padding: 40px;
      box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.1);
    }
  </style>    
</head>
    <body>
    <div class="container">

    
        <h1 style="text-align: center;">Gerenciador de Tarefas</h1>
        <form  method="post" action="../view/loginV.php">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="email" aria-label="email" name="email" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">**</span>
            <input type="text" class="form-control" placeholder="password" aria-label="password" name="password" aria-describedby="basic-addon1">
        </div>

        <div style="text-align: center;">
            
            <button type="submit" class="btn btn-outline-success">Entrar</button>
        </div>
            
        </form>
        <?php
            if( isset($_GET['erro']) && $_GET['erro']==1 ){
                ?>
                <div class="alert alert-danger" role="alert">
                    E-mail ou senha inválido!
                </div>
                <?php
            }
        ?>
    </div>
    </body>
</html>