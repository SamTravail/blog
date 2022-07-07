<?php include('inc/header-back.php');
?>
<H1>New Post</H1>

<?php

require('../inc/pdo.php');
require('../inc/fonction.php');

// Traitement PHP

// Formulaire est soumis ???
$success = false;
$errors = array();
if(!empty($_POST['submitted'])) {
    // Faille XSS

    $title = cleanXss('title');
    $content = trim(strip_tags($_POST['content']));
    $auteur = trim(strip_tags($_POST['auteur']));
    $status = trim(strip_tags($_POST['status']));
    // Validation
    $errors = validText($errors,$title,'title',3,100);
    $errors = validText($errors,$content,'content',10,1000);
    $errors = validText($errors, $auteur, 'auteur',2,50);
    $errors = validText($errors, $status, 'status',5,20);
    

    if(count($errors) === 0) {
        // insertion en BDD si aucune error
        // $sql = "INSERT INTO article (title,created_at) VALUES (:title,NOW())";
        $sql = "INSERT INTO article (title,content,auteur,status,created_at) VALUES (:title,:content,:auteur,:status,NOW())";
        $query = $pdo->prepare($sql);
        // ATTENTION INJECTION SQL
        $query->bindValue(':title',$title, PDO::PARAM_STR);
        $query->bindValue(':content',$content, PDO::PARAM_STR);
        $query->bindValue(':auteur',$auteur, PDO::PARAM_STR);
        $query->bindValue(':status',$status, PDO::PARAM_STR);
        $query->execute();
        $last_id = $pdo->lastInsertId();
        header('Location: index.php?id=' . $last_id);
       $success = true;
    }
}
debug($_POST);
debug($errors);

include('../inc/header.php'); ?>
    <h1>Ajouter un nouveau post</h1>
    <form action="" method="post" novalidate>
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" value="<?php if(!empty($_POST['title'])) { echo $_POST['title']; } ?>">
        <span class="error"><?php if(!empty($errors['title'])) { echo $errors['title']; } ?></span>

        <label for="content">Contenu</label>
        <textarea name="content" id="content" cols="30" rows="10"><?php if(!empty($_POST['content'])) { echo $_POST['content']; } ?></textarea>
        <span class="error"><?php if(!empty($errors['content'])) { echo $errors['content']; } ?></span>

        <label for="auteur">Auteur</label>
        <input type="text" name="auteur" id="auteur" value="<?php if(!empty($_POST['auteur'])) { echo $_POST['auteur']; } ?>">
        <span class="error"><?php if(!empty($errors['auteur'])) { echo $errors['auteur']; } ?></span>

        <label for="status">Status</label>
        <input type="text" name="status" id="status" value="<?php if(!empty($_POST['status'])) { echo $_POST['status']; } ?>">
        <span class="error"><?php if(!empty($errors['status'])) { echo $errors['status']; } ?></span>

        <input type="submit" name="submitted" value="Ajouter un New Post !">
    </form>
<?php include('../inc/footer.php');