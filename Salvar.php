<?php
require_once 'Conexao.php';

// Se for uma requisição POST, insere o feedback
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera e valida os dados
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $perfil = isset($_POST['perfil']) ? trim($_POST['perfil']) : '';
    $opiniao = isset($_POST['opiniao']) ? trim($_POST['opiniao']) : '';
    $melhorias = isset($_POST['melhorias']) ? trim($_POST['melhorias']) : '';

    header('Content-Type: application/json; charset=utf-8');

    if ($nome === '' || $perfil === '' || $opiniao === '' || $melhorias === '') {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Por favor, preencha todos os campos.']);
        exit;
    }

    try {
        $sql = "INSERT INTO feedbacks (nome, perfil, opiniao, melhorias, data_criacao) VALUES (:nome, :perfil, :opiniao, :melhorias, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome' => $nome,
            ':perfil' => $perfil,
            ':opiniao' => $opiniao,
            ':melhorias' => $melhorias
        ]);

        echo json_encode(['success' => true, 'message' => 'Feedback salvo com sucesso.']);
        exit;
    } catch (PDOException $e) {
        error_log('Erro ao salvar feedback: ' . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Erro ao salvar feedback.']);
        exit;
    }
}

// Para requisições GET (ou outras), exibe a listagem atual de feedbacks
try {
    $sql = "SELECT * FROM feedbacks ORDER BY data_criacao DESC";
    $stmt = $pdo->query($sql);
    $feedbacks = $stmt->fetchAll();

    if (count($feedbacks) === 0) {
        echo "<p>Nenhum feedback enviado ainda.</p>";
        exit();
    }

    foreach ($feedbacks as $feedback) {
        echo "<div class='feedback'>";
        echo "<h3>" . htmlspecialchars($feedback['nome']) . "</h3>";
        if (!empty($feedback['perfil'])) {
            echo "<p><strong>Perfil:</strong> " . htmlspecialchars($feedback['perfil']) . "</p>";
        }
        if (!empty($feedback['opiniao'])) {
            echo "<p><strong>Opinião:</strong> " . nl2br(htmlspecialchars($feedback['opiniao'])) . "</p>";
        }
        if (!empty($feedback['melhorias'])) {
            echo "<p><strong>Sugestões:</strong> " . nl2br(htmlspecialchars($feedback['melhorias'])) . "</p>";
        }
        echo "<small>Data: " . date('d/m/Y H:i', strtotime($feedback['data_criacao'])) . "</small>";
        echo "</div>";
    }
} catch(PDOException $e) {
    error_log("Erro ao listar feedbacks: " . $e->getMessage());
    echo "<p>Erro ao carregar feedbacks. Tente novamente mais tarde.</p>";
}