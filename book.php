<?php
require_once 'inc/loader.php';
if (!empty($_GET['id'])) {
    $query = $database->query('SELECT * FROM bn_books WHERE id=' . $_GET['id']);
    $book = $query->fetch();
    ?>
    <ul class="breadcrumb">
        <li>
            <a href="books.php">Ouvrages</a> <span class="divider">/</span>
        </li>
        <li class="active">
            <?php echo $book->title; ?>
        </li>
    </ul>
    <div class="well">
        <div class="row">
            <div class="span2"><img src="img/book_128.png" /></div>
            <div class="span8">
                <h2>Informations sur l'ouvrage</h2>
                <ul>
                    <li>Titre : <?php echo $book->title; ?></li>
                    <li>Auteur : <?php echo $book->author; ?></li>
                    <li>Editeur : <?php echo $book->publisher; ?></li>
                    <li>ISBN13 : <?php echo $book->isbn; ?></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
} else {
    flash('Erreur. Aucun livre ne correspond à votre recherche.', 'error');
}
template();