<?php

/************ Librairie de code pour gérer le catalogue des produits **********/

function obtenirThemes($cnx)
{
  return lire($cnx, "SELECT * FROM theme");
}

function obtenirProduits($cnx, $filtre, $tri)
{
  // Comme le prix n'est pas une valeur de données, on ne peut pas utiliser les placeholders (?) 
  // Donc, il faut s'assurer que cette variable ne contient rien d'autre qu'une valeur dans 
  // liste de valeurs permises...
  $tri = in_array($tri, ["prix DESC", "prix ASC", "nom DESC", "nom ASC", "dac DESC", "dac ASC", "ventes DESC"]) ? $tri : "RAND()";
  $clauseWhere = $filtre == "tous" ? "" : "WHERE thm_id=?";
  $params = ($filtre == "tous") ? [] : [$filtre];
  return lire($cnx, "SELECT * FROM produit $clauseWhere ORDER BY $tri", $params);
}
