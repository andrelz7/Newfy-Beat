<?php
require_once 'Conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo 'Método não permitido';
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$perfil = trim($_POST['perfil'] ?? '');
$opiniao = trim($_POST['opiniao'] ?? '');
$melhorias = trim($_POST['melhorias'] ?? '');

// Validação mínima
if ($nome === '' || $perfil === '' || $opiniao === '' || $melhorias === '') {
    // Redireciona de volta com erro simples
    header('Location: site.php?error=1');
    exit;
}

try {
    $sql = "INSERT INTO respostas_projeto
            (nome, voce_e, selecione, o_que_entendeu, sugestao_1, sugestao_2)
            VALUES (:nome, :voce_e, NULL, :o_que_entendeu, :sug1, NULL)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':voce_e' => $perfil,
        ':o_que_entendeu' => $opiniao,
        ':sug1' => $melhorias,
    ]);

    // Sucesso: redireciona para a página de listagem
    header('Location: Listar.php?saved=1');
    exit;
} catch (PDOException $e) {
    error_log('Erro ao salvar resposta: ' . $e->getMessage());
    header('Location: site.php?error=2');
    exit;
}
