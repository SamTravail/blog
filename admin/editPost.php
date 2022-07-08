<?php 

// ajout du header-back pour retour index-back !
include('inc/header-back.php');

// Importation des fonctions
require('../inc/pdo.php');
require('../inc/fonction.php');

// Selection dans la BDD articles, et affichage par date décroissante
$select_articles = "SELECT * FROM articles ORDER BY title DESC";

// préparation pour l'injection SQL
$query = $pdo->prepare($select_articles);

// INJECTION SQL
$query->execute();

// Affiche le résultat
$articles = $query->fetchAll();
?>

<!-- création tu tableau pour affichage des résultats -->
<h1>Liste des articles</h1>
<table>
   <thead>
    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Auteur</th>
        <th>Status</th>
        <th>Editer</th>
    </tr>
   </thead>
 
    <!-- affichage des éléments récuppérés dans le tableau -->
    <tbody>
        <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?=$article['id']?></td>
            <td><?=$article['title']?></td>
            <td><?=$article['content']?></td>
            <td><?=$article['auteur']?></td>
            <td><?=$article['status']?></td>
            <td><a href="">Editer</a></td>
        </tr>
        <?php } ?>
   </tbody>
</table>
<?php include('inc/footer-back.php');?>