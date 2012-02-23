<?php
require_once 'inc/loader.php';
$search = !empty($_GET['s']) ? _q($_GET['s']) : '';
?>
<h2>Tous les ouvrages</h2>
<?php
$page = !empty($_GET['page']) ? $_GET['page'] : 1;
$query = $database->prepare("
    SELECT COUNT(*) AS count
    FROM bn_books
    WHERE
        title LIKE :search
        OR author LIKE :search
        OR SOUNDEX(title) = SOUNDEX(:search2)
        OR SOUNDEX(author) = SOUNDEX(:search2)
    ");
$query->bindValue('search', '%' . $search . '%');
$query->bindValue('search2', $search);
$query->execute();
$count = $query->fetch();
$pages = ceil($count->count / 10);
$query = $database->prepare("
    SELECT *
    FROM bn_books
    WHERE
        title LIKE :search
        OR author LIKE :search
        OR SOUNDEX(title) = SOUNDEX(:search2)
        OR SOUNDEX(author) = SOUNDEX(:search2)
    ORDER BY title ASC LIMIT :limit,10");
$query->bindValue('limit', (($page - 1) * 10), PDO::PARAM_INT);
$query->bindValue('search', '%' . $search . '%');
$query->bindValue('search2', $search);
$query->execute();
$results = $query->fetchAll();
$i = 0;
?>
<form class="form-search form-inline" action="" method="get" style="float: right;">
    <input type="text" name="s" placeholder="Recherche..." value="<?php echo $search; ?>" />
</form>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Éditeur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $book): ++$i;?>
        <tr>
            <td><a href="book.php?id=<?php echo $book->id; ?>"><?php echo $book->title; ?></a></td>
            <td><?php echo $book->author; ?></td>
            <td><?php echo $book->publisher; ?></td>
        </tr>
        <?php endforeach; ?>
        <?php if (!$i) : ?>
            <tr>
                <td colspan="3">Votre recherche n'a retourné aucun résultat.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="pagination" style="float: right;">
  <ul>
    <li><a href="books.php?page=1<?php echo $search ? '&s=' . _p($search) : ''; ?>">&larr;</a></li>
    <?php
    for ($i=1;$i<=$pages;$i++) {
        echo '<li' . ($i == $page ? ' class="active"' : '') . '><a href="books.php?page=' . $i . ($search ? '&s=' . $search : '') . '">' . $i . '</a></li>';
    }
    ?>
    <li><a href="books.php?page=<?php echo $pages; ?><?php echo $search ? '&s=' . _p($search) : ''; ?>">&rarr;</a></li>
  </ul>
</div>
<div style="clear: both;">&nbsp</div>
<?php
template();