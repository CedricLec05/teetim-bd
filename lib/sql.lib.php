<?php
// Configuration de connexion à déplacer dans un endroit sécure (pas vu en classe)
const HOTE = "db";
const UTIL = "teetim";
const MDP = "teetim";
const BD = "teetim";


function connexion()
{
    $dsn = "mysql:host=" . HOTE . ";dbname=" . BD . ";charset=utf8mb4";
    $cnx = new PDO($dsn, UTIL, MDP, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ]);
    return $cnx;
}

/** 
 * Exécute un requête paramétrée.
 * @param PDO $cnx Objet de connexion PDO.
 * @param string $req Chaîne de requête SQL.
 * @param array $params Tableau des valeurs à remplacer dans les paramètres (Par défaut : tableau vide).
 * @return PDOStatement un objet contenant le résultat ou false si la requête a échoué
 */
function requete($cnx, $req, $params = [])
{
    $stmt = $cnx->prepare($req);
    if (!$stmt) {
        return false;
    }
    $resultat = $stmt->execute($params);
    return $resultat ? $stmt : false;
}

function creer() {}

function lire($cnx, $req, $params = [])
{
    $res = requete($cnx, $req, $params);
    if (!$res) {
        return [];
    }
    return $res->fetchAll();
}

function modifier() {}

function supprimer() {}
