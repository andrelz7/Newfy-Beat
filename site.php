<?php


if (isset($_POST['submit'])) {
    // Exibir os valores enviados de forma segura
    echo '<pre>';
    echo 'Nome: ' . htmlspecialchars($_POST['nome'] ?? '') . "\n";
    echo 'Perfil: ' . htmlspecialchars($_POST['perfil'] ?? '') . "\n"; // uso do índice correto 'perfil'
    echo 'Opinião: ' . htmlspecialchars($_POST['opiniao'] ?? '') . "\n";
    echo 'Melhorias: ' . htmlspecialchars($_POST['melhorias'] ?? '') . "\n";
    echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newfy Beat</title>
    <!-- favicon -->
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <style>
        :root{
            --primary: #c92525; /* vermelho do logo */
            --primary-dark: #a21b1b;
            --accent: #004080; /* azul de destaque */
            --muted-bg: #f5f7fb;
            --panel-bg: #ffffff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--muted-bg);
            color: #222;
        }

               header {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--primary);
            color: white;
            padding: 12px 20px;
            text-align: left;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        /* Logo ao lado do título */
        #site-logo {
            height: 48px;
            width: auto;
            display: inline-block;
            border-radius: 6px;
            background: rgba(255,255,255,0.06);
            padding: 4px;
        }

        header h1 {
            margin: 0;
            font-size: 32px;
            letter-spacing: 0.5px;
        }

        header p {
            margin: 0;
            font-style: italic;
            font-size: 14px;
            opacity: 0.9;
        }

        
        .container {
            width: 80%;
            max-width: 900px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            overflow: hidden;
        }

       
        .left {
            float: left;
            width: 60%;
        }

        .left h2 {
            color: #c92525;
        }

        .left p {
            color: #333;
            line-height: 1.6;
        }

        
        form {
            margin-top: 15px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 6px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background: #c92525;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            margin-top: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background: #a81f1f;
        }

        
        .right {
            float: right;
            width: 35%;
            background: #f1f3f9;
            padding: 15px;
            border-radius: 5px;
        }

        .right h3 {
            color: #004080;
        }

        .right p {
            color: #333;
            font-size: 14px;
        }

        
        footer {
            clear: both;
            background: #c92525;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            margin-top: auto ;
        }

        footer a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <header>
        <img id="site-logo" src="logo.ico" alt="Logo Newfy Beat">
        <h1>Newfy Beat</h1>
        <p style="margin-left:8px;">O</p>
    </header>
    
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <div class="container">
        <div class="left">
            <h2>Oque é a Newfy Beat</h2>
            <p>Nosso projeto se trata da ideia de uma rede social voltada para todo e qualquer tipo de música, buscando uma interação entre usuários com gostos similares, recomendações por algoritmo baseado nas atividades recentes do usuário e diversas outras funções dentro do meio musical.</p>

            <h2>Quem somos?</h2>
            <p>Somos um grupo de estudantes do curso de Desenvolvimento de Sistemas que buscamos levar a ideia de nosso projeto a frente, hoje apresentando apenas uma demonstração do que seria uma página de nosso site!.</p>



           <form id="formulario" method="POST" action="Salvar.php">
    <label>Nome:</label>
    <input type="text" name="nome" id="nome" required>


  

  <label>Você é?:</label>
    <select name="perfil" id="perfil" required>
        <option value="">Selecione...</option>
        <option value="professor">Professor</option>
        <option value="aluno">Aluno</option>
        <option value="convidado">Convidado</option>
    </select>

    <label>O que você entendeu do projeto:</label>
    <input type="text" name="opiniao" id="opiniao" required>

    <label>Duas sugestões de melhorias:</label>
    <input type="text" name="melhorias" id="melhorias" required>

    <input type="submit" value="Enviar" name="submit">
</form>
            
        </div>

        <div class="right">
            <h3>3 texto</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudantium.</p>

            <h3>Como nos contatar</h3>
            <p></p>
        </div>
    </div>

    <footer>
    &copy; 2025 Newfy Beat. Todos os direitos reservados / <a href="Direitos de privacidade /"   ></a>
    </footer>


   
</script>
</body>
</html>
