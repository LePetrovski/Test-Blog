<?php
/**
 * User: Petrovski
 * Date: 07/11/2018
 * Time: 13:11
 * Create a model
 */

function dbConnect()
{
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
}