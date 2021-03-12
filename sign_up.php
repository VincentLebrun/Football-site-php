<?php
include("tpl/header.php");
?>

<form action="" method="post">
    <div class="formWrapper">
    <h2>Créer un compte</h2>
        <div class="wrapper">
        
            <div class="form-group">
                <label  for="inputEmail">Email :</label>
                <input type="email" name="email" id="inputEmail" value="<?= isset($email) ? $email : "" ?>">
                <?php echo isset($errors["email"]) ? "<p class=\"error\">{$errors["email"]}</p>" : "" ?>
            </div>
            <div class="form-group">
                <label for="confirmEmail">confirmer email</label>
                <input type="text">
            </div>

        </div>
        <div class="wrapper">
            <div class="form-group">
                <label  for="inputPassword">Mot de passe :</label>
                <input type="password" name="password" id="inputPassword" value="<?= isset($password) ? $password : "" ?>">
                <?php echo isset($errors["password"]) ? "<p class=\"error\">{$errors["password"]}</p>" : "" ?>
            </div>
            <div class="form-group">
                <label for="inputRetypePassword">Confirmation le mot de passe :</label>
                <input type="password" name="retypePassword" id="inputRetypePassword" value="<?= isset($retypePassword) ? $retypePassword : "" ?>">
                <?php echo isset($errors["retypePassword"]) ? "<p class=\"error\">{$errors["retypePassword"]}</p>" : "" ?>
            </div>
        </div>

        <input type="submit" value="Création du compte">
    </div>
</form>


<?php
include("tpl/footer.php");
?>