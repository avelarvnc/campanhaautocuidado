<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário de Autocuidado</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header-comum">
        <a href="index.html" class="link-voltar">↩ Voltar</a>
        <div class="header-comum-itens">
            <img src="midia/logo-mini.svg" class="logo-mini" alt="logotipo com duas mãos envolvendo um coração">
            <div class="user-area">
                <span class="user-icon">👤</span>
                <span class="user-name"><?php echo $_SESSION["uname"]; ?></span><br>
                <a href="login.html" class="logout-link">Sair</a>
            </div>
        </div>
       
    </header>

    <main>
        <section class="home-text">

            <h2>Últimas atividades</h2> 
            <p>(10 últimos registros realizados)</p>
            
           
            <?php
                //$link = mysqli_connect("localhost", "id20445259_admin", "S3n@c2023SAN", "id20445259_calendariobemestar");
                $link = mysqli_connect("localhost", "root", "", "calendariobemestar");


                // Check connection
                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
            
                // Attempt insert query execution
                $sql = "SELECT * FROM atividade WHERE idUsuario = " . $_SESSION["uid"] . " ORDER BY idAtividade DESC LIMIT 10;";
                $result = mysqli_query($link,$sql);

                if ($result->num_rows > 0){
                    echo "<ul>";
                    while($row = $result->fetch_assoc()) {
                        echo "<li>" . $row["descricao"] . "</li>";
                    }   
                    echo "</ul>";
                }
                else{
                    echo "<p>Nenhuma atividade foi encontrada. Que tal começar agora? :) </p>";
                }
               
                mysqli_close($link);
            ?>
               
                
            </form>
        </section>

        <section class="record-activity">
            <form action="activityregister.php" class="form-cadastro">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" class="input-comum" required>
                <label for="activity">O que você fez?</label>
                <textarea name="atividade" id="atividade" cols="30" rows="10" placeholder="Escreva aqui o que você gostaria de registrar" class="input-comum" required></textarea>
                <input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION["uid"]; ?>">
                <a href="hint.php" class="link-pequeno">Não sabe o que registrar? Clique aqui para ver algumas dicas. :)</a>
                <input type="submit" value="Enviar" class="botao-comum">


            </form>
        </section>

        <footer>
            Informações de rodapé
        </footer>
    </main>
</body>
</html>