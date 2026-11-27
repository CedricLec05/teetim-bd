<?php

/************ Librairie de code pour gérer le catalogue des produits **********/

function obtenirThemes($cnx)
{
  return lire($cnx, "SELECT * FROM theme");
}

function obtenirProduits($cnx)
{
  return lire($cnx, "SELECT * FROM produit");
}
