<?php
require_once 'inc/loader.php';
?>
<div class="well">
    <img src="img/biblio/2.png" />
</div>
<div class="row">
    <div class="span4">
        <div class="well" style="height: 150px; text-align: center;">
            <img src="img/biblio/1.jpg" style="border-radius: 3px;" />
        </div>
    </div>
    <div class="span4">
        <div class="well" style="position: relative; height: 150px; padding-left: 0; padding-right: 0;">
            <img src="img/book_128.png" style="height: 64px; position: absolute; bottom: -15px; right: -15px;" />
            <ul class="nav nav-list">
                <li class="nav-header">
                    5 derniers ouvrages
                </li>
                <li>
                    <?php
                    $query = $database->query('SELECT * FROM bn_books ORDER BY id DESC LIMIT 0,5');
                    $books = $query->fetchAll();
                    foreach ($books as $book): ?>
                        <a href="book.php?id=<?php echo $book->id; ?>">
                            <i class="icon-book"></i>
                            <?php echo $book->title; ?>
                        </a>
                    <?php endforeach; ?>
                </li>
            </ul>
        </div>
    </div>
    <div class="span4">
        <div class="well" style="position: relative; height: 150px;">
            <?php if (!isUser()): ?>
                <h4>Connexion utilisateur</h4><br />
                <img src="img/user_64.png" style="position: absolute; bottom: -15px; right: -15px;" />
                <form action="login.php" method="post">
                    <div class="controls">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input class="span2" id="email" type="email" name="email" placeholder="E-mail" style="width: 80%;" required="required" />
                        </div>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span>
                            <input class="span2" id="email" type="password" name="pass" placeholder="Mot de passe" style="width: 80%;" required="required" />
                        </div>
                        <button type="submit" class="btn btn-primary" />Connexion</button>
                    </div>
                </form>
            <?php else: ?>
                <h4>Profil utilisateur</h4><hr />
                <img src="img/user_64.png" style="position: absolute; bottom: -15px; right: -15px;" />
                <p>Bienvenue, <?php echo _p($_SESSION['username']); ?></p>
                <p><a href="profile.php">Votre compte <?php echo isAdmin() ? 'administrateur' : 'utilisateur'; ?></a></p>
                <p><a href="logout.php" class="label label-important"><i class="icon-white icon-remove"></i> Déconnexion</a></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="span6">
        <div class="well" style="height: 300px;">
            <h4>Accès</h4><hr />
            <iframe width="425" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.fr/maps?f=q&amp;source=s_q&amp;hl=fr&amp;geocode=&amp;q=nantes&amp;aq=&amp;sll=47.238222,-1.560056&amp;sspn=0.134964,0.338173&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Nantes,+Loire-Atlantique,+Pays+de+la+Loire&amp;ll=47.218371,-1.553621&amp;spn=0.13502,0.338173&amp;z=12&amp;output=embed"></iframe><br /><small><a href="https://maps.google.fr/maps?f=q&amp;source=embed&amp;hl=fr&amp;geocode=&amp;q=nantes&amp;aq=&amp;sll=47.238222,-1.560056&amp;sspn=0.134964,0.338173&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Nantes,+Loire-Atlantique,+Pays+de+la+Loire&amp;ll=47.218371,-1.553621&amp;spn=0.13502,0.338173&amp;z=12" style="color:#0000FF;text-align:left">Agrandir le plan</a></small>
        </div>
    </div>
    <div class="span6">
        <div class="well" style="height: 300px;">
            <h4>Horaires</h4><hr />
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <td>Lundi</td>
                        <td>11h - 18h</td>
                    </tr>
                    <tr>
                        <td>Mardi</td>
                        <td>9h - 18h</td>
                    </tr>
                    <tr>
                        <td>Mercredi</td>
                        <td>9h - 18h</td>
                    </tr>
                    <tr>
                        <td>Jeudi</td>
                        <td>9h - 18h</td>
                    </tr>
                    <tr>
                        <td>Vendredi</td>
                        <td>9h - 18h</td>
                    </tr>
                    <tr>
                        <td>Samedi</td>
                        <td>9h - 17h</td>
                    </tr>
                    <tr>
                        <td>Dimanche</td>
                        <td>9h - 12h</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
template();