<?php

/************ Librairie de code pour gérer le catalogue des produits **********/

/**
 * Retourne les thèmes.
 * @return array Tableau contenant des objets représentant les thèmes.
 */
function obtenirThemes()
{
  $dsn = "mysql:host=db;dbname=teetim;charset=utf8mb4";
  $cnx = new PDO($dsn, "teetim", "teetim", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  $stmt = $cnx->prepare("SELECT * FROM theme");
  if (!$stmt) {
    return false;
  }
  $resultat = $stmt->execute();
  if ($resultat) {
    return $stmt->fetchAll();
  }
  return [];
}

/**
 * Retourne les produits de la catégorie demandée.
 * @param string $categorie Catégorie de produits (ex: teeshirts, casquettes, etc.)
 * @param string $critereTri Valeur du critère de tri.
 * @param string $critereFiltre Valeur du critère de filtre.
 * @return array Tableau contenant des objets qui représentent les produits.
 */
function obtenirProduits($categorie, $critereTri, $critereFiltre)
{
  $cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');
  $clauseWhere = $critereFiltre === "tous" ? "" : "where thm_id = $critereFiltre";
  $sql = "SELECT * FROM produit $clauseWhere ORDER BY $critereTri";
  $resultat = $cnx->query($sql);
  $produits = [];
  while ($prod = $resultat->fetch_object()) {
    $produits[] = $prod;
  }
  return $produits;
}
