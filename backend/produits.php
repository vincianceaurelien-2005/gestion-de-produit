<?php
require 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    case 'GET':
        $stmt = $pdo->query("SELECT *, ROUND(prix * quantite, 2) AS montant FROM Produit ORDER BY numProduit DESC");
        echo json_encode(["success" => true, "data" => $stmt->fetchAll()]);
        break;

    case 'POST':
        $d = json_decode(file_get_contents("php://input"), true);
        if (empty($d['design']) || !isset($d['prix']) || !isset($d['quantite'])) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Champs manquants"]);
            break;
        }
        $stmt = $pdo->prepare("INSERT INTO Produit (design, prix, quantite) VALUES (?, ?, ?)");
        $stmt->execute([$d['design'], floatval($d['prix']), intval($d['quantite'])]);
        echo json_encode(["success" => true, "message" => "Insertion réussie", "id" => $pdo->lastInsertId()]);
        break;

    case 'PUT':
        $d = json_decode(file_get_contents("php://input"), true);
        if (empty($d['numProduit']) || empty($d['design']) || !isset($d['prix']) || !isset($d['quantite'])) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "Champs manquants"]);
            break;
        }
        $stmt = $pdo->prepare("UPDATE Produit SET design=?, prix=?, quantite=? WHERE numProduit=?");
        $stmt->execute([$d['design'], floatval($d['prix']), intval($d['quantite']), intval($d['numProduit'])]);
        echo json_encode(["success" => true, "message" => "Modification réussie"]);
        break;

    case 'DELETE':
        $d = json_decode(file_get_contents("php://input"), true);
        if (empty($d['numProduit'])) {
            http_response_code(400);
            echo json_encode(["success" => false, "message" => "ID manquant"]);
            break;
        }
        $stmt = $pdo->prepare("DELETE FROM Produit WHERE numProduit=?");
        $stmt->execute([intval($d['numProduit'])]);
        echo json_encode(["success" => true, "message" => "Suppression réussie"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["success" => false, "message" => "Méthode non autorisée"]);
        break;
}
?>
