<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $d        = json_decode(file_get_contents("php://input"), true);
    $login    = trim($d['login']    ?? '');
    $password = trim($d['password'] ?? '');

    if (!$login || !$password) {
        http_response_code(400);
        echo json_encode(["success" => false, "message" => "Champs manquants"]);
        exit();
    }

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE login = ? AND password = ?");
    $stmt->execute([$login, $password]);
    $user = $stmt->fetch();

    if ($user) {
        echo json_encode([
            "success" => true,
            "message" => "Connexion réussie",
            "user"    => ["login" => $user['login'], "nom" => $user['nom']]
        ]);
    } else {
        http_response_code(401);
        echo json_encode(["success" => false, "message" => "Identifiants incorrects"]);
    }

} else {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Méthode non autorisée"]);
}
?>
