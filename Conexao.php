<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "newfybeat";

try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$banco;charset=utf8mb4", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    error_log("Erro na conexão: " . $e->getMessage());
    die("Erro ao conectar ao banco de dados");
}