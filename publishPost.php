 <!-- création tu tableau pour affichage des articles publiés -->
<h1>Articles publiés</h1>
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
        <?php if $status  { ?>
        <tr>
            <td><?=$article['title']?></td>
            <td><?=$article['auteur']?></td>
            <td><?=$article['modified_at']?></td>
        </tr>
        <?php } ?>
   </tbody>
</table>
