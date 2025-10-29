<?php
require_once 'Conexao.php';

try {
    $sql = 'SELECT id, nome, voce_e, selecione, o_que_entendeu, sugestao_1, sugestao_2, criado_em FROM respostas_projeto ORDER BY criado_em DESC';
    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();
} catch (PDOException $e) {
    die('Erro ao recuperar respostas: ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Listar Respostas - Newfy Beat</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Respostas recebidas</h1>
    <p><a href="site.php">Voltar ao formulário</a></p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Perfil</th>
                <th>O que entendeu</th>
                <th>Sugestão 1</th>
                <th>Sugestão 2</th>
                <th>Criado em</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($rows)): ?>
            <tr><td colspan="7">Nenhuma resposta encontrada.</td></tr>
        <?php else: ?>
            <?php foreach ($rows as $r): ?>
                <tr>
                    <td><?= htmlspecialchars($r['id']) ?></td>
                    <td><?= htmlspecialchars($r['nome']) ?></td>
                    <td><?= htmlspecialchars($r['voce_e']) ?></td>
                    <td><?= nl2br(htmlspecialchars($r['o_que_entendeu'])) ?></td>
                    <td><?= nl2br(htmlspecialchars($r['sugestao_1'])) ?></td>
                    <td><?= nl2br(htmlspecialchars($r['sugestao_2'])) ?></td>
                    <td><?= htmlspecialchars($r['criado_em']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
