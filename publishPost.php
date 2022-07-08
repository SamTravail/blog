<?php

// ajout du header-back pour retour index-back !
include('inc/header-back.php'); ?>

<!-- création tu tableau pour affichage des résultats -->
<h1>Liste des articles</h1>
<table>
   <thead>
    <tr>
        <th>Title</th>
        <th>Auteur</th>
        <th>Publié le :</th>

    </tr>
   </thead>
 
    <!-- affichage des éléments récuppérés dans le tableau -->
    <tbody>
        <?php foreach ($articles as $article) { ?>
        <tr>
            <td><?=$article['title']?></td>
            <td><?=$article['auteur']?></td>
            <td><?=$article['modified_at']?></td>
        </tr>
        <?php } ?>
   </tbody>
</table>
<?php include('inc/footer-back.php'); ?>