<?php
require_once 'Conexao.php';

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
        echo "<p><strong>Opinião:</strong> " . nl2br(htmlspecialchars($feedback['opiniao'])) . "</p>";
        echo "<p><strong>Sugestões:</strong> " . nl2br(htmlspecialchars($feedback['melhorias'])) . "</p>";
        echo "<small>Data: " . date('d/m/Y H:i', strtotime($feedback['data_criacao'])) . "</small>";
        echo "</div>";
    }
} catch(PDOException $e) {
    error_log("Erro ao listar feedbacks: " . $e->getMessage());
    echo "<p>Erro ao carregar feedbacks. Tente novamente mais tarde.</p>";
}