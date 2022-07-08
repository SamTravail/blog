<?php

require('../inc/pdo.php');
require('../inc/fonction.php');

// Traitement PHP
// Création du tableau des erreurs
$errors = array();

//Si il n'y a pas de submit,
if(!empty($_POST['submitted'])) {
    
    // Retrait des espaces,  Faille XSS
    $title = trim(strip_tags($_POST['title']));
    $content = trim(strip_tags($_POST['content']));
    $auteur = trim(strip_tags($_POST['auteur']));
    $status = trim(strip_tags($_POST['status']));

    // Vérification des champs pour validation
    $errors = validText($errors,$title,'title',3,100);
    $errors = validText($errors,$content,'content',10,1000);
    $errors = validText($errors, $auteur, 'auteur',2,50);
    $errors = validText($errors, $status, 'status',5,20);
    
    // Si pas d'erreurs, alors :
    if(count($errors) === 0) {
    // die('ok');
        // Update dans la BDD
        $sql = "UPDATE articles SET title= :title, content= :content, auteur = :auteur, status= :status,  WHERE id= :id";

        $query = $pdo->prepare($sql);

        // INJECTION SQL
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->bindValue(':content',$content, PDO::PARAM_STR);
        $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
        $query->bindValue(':status',$status, PDO::PARAM_STR);
        $query->bindValue(':id',$id, PDO::PARAM_INT);
        $query->execute();
        header('Location: index.php');

        // retour apres injection
        // header('Location: index.php?id=' . $last_id);

        // Formulaire soumis !
       $success = true;
    }
}
debug($_POST);
debug($errors);

include('inc/header-back.php'); ?>

    <h1>Edition d'un Article</h1>
    <form action="" method="post" novalidate class="wrap2">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?= getValue('title',$title['tilte']); ?>">
        <span class="error"><?php if(!empty($errors['title'])) { echo $errors['title']; } ?></span>

        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10"><?= getValue('title',$title['tilte']); ?></textarea>
        <span class="error"><?php if(!empty($errors['content'])) { echo $errors['content']; } ?></span>

        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" value="<?php if(!empty($_POST['auteur'])) { echo $_POST['auteur']; } ?>">
        <span class="error"><?php if(!empty($errors['auteur'])) { echo $errors['auteur']; } ?></span>
        
        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="<?php if(!empty($_POST['status'])) { echo $_POST['status']; } ?>">
        <span class="status"><?php if(!empty($errors['status'])) { echo $errors['status']; } ?></span>
        
        <input type="submit" name="submitted" value="Modifier le Post !">
    </form>
<?php include('inc/footer-back.php');?>