<?php
require_once 'inc/loader.php';

if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['pass1']) && !empty($_POST['pass2'])) {
    if ($_POST['pass1'] == $_POST['pass2']) {
        $pass = $_POST['pass1'];
        $name = substr($_POST['name'], 0, 30);
        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                $query = $database->prepare('SELECT COUNT(*) AS count FROM bn_accounts WHERE email = ?');
                $query->execute(array($email));
                $result = $query->fetch();
                if ($result->count == 0) {
                    $query = $database->prepare('INSERT INTO bn_accounts (name, email, pass) VALUES (?, ?, ?)');
                    $query->execute(array($name, $email, md5($pass)));
                    flash('Inscription effectuée.', 'success');
                    redirect('index.php');
                } else {
                    flash('Cette adresse email est déjà enregistrée.', 'error');
                }
            } catch (Exception $e) {
                flash('Une erreur est survenue lors de l\'inscription.', 'error');
            }
        } else {
            flash('L\'adresse e-mail fournie est invalide.', 'error');
        }
    } else {
        flash('Les mots de passe ne correspondent pas', 'error');
    }
}

?>
<div class="row">
    <div class="span4 offset4">
        <div class="well">
            <h2>Inscription</h2><hr />
            <form action="" method="post">
                <div class="controls">
                    <label for="name">Nom</label>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-user"></i></span>
                        <input type="text" maxlength="30" name="name" id="name" required="required" value="<?php echo value('name'); ?>" />
                    </div>
                    <label for="email">E-mail</label>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-envelope"></i></span>
                        <input type="email" name="email" id="email" required="required"  value="<?php echo value('email'); ?>" />
                    </div>
                    <label for="pass1">Mot de passe</label>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input type="password" name="pass1" id="pass1" required="required" />
                    </div>
                    <label for="pass2">Confirmation</label>
                    <div class="input-prepend">
                        <span class="add-on"><i class="icon-lock"></i></span>
                        <input type="password" name="pass2" id="pass2" required="required" />
                    </div>
                </div>
                <div class="form-actions" style="padding-left: 0; padding-bottom: 0;">
                    <input class="btn btn-primary" type="submit" value="Valider" />
                </div>
            </form>
        </div>
    </div>
</div>
<?php
template();