<?php
include("tpl/header.php");
$message ="";
if (!empty($_POST)) {
    $errors = [];
    $email = trim(strip_tags($_POST["inputEmail"]));
    $retypeEmail = trim(strip_tags($_POST["RetypeEmail"]));  
    $password = trim(strip_tags($_POST["password"]));
    $retypePassword = trim(strip_tags($_POST["RetypePassword"]));
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "L'email nest pas valide";
    }
    if($password != $retypePassword){
        $errors["retypePassword"]= "Le mot de passe ne correspond pas veuillez retaper votre mot de passe";
    }
    if(empty($errors)) {
    $password =password_hash($password, PASSWORD_DEFAULT);
    $db = new PDO("mysql:host=localhost;dbname=telefoot", "root", "");
    $query = $db->prepare("INSERT INTO users (email, password ) VALUES (:email, :password)");
    $query->bindParam("email", $email);
    $query->bindParam(":password", $password);
    
    if($query->execute()) {
        header("Location: login.php" );
    }else {
        $message= "<p class=\"error\">Un problème est survenu lors de la création de votre compte, veuillez réessayer !</p>";
       }
   }
}
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
                <label for="confirmEmail">Confirmer email :</label>
                <input type="email" name="email" id="inputRetypeEmail" value="<?= isset($retypeEmail) ? $retypeEmail : "" ?>">
                <?php echo isset($errors["retypeEmail"]) ? "<p class=\"error\">{$errors["email"]}</p>" : "" ?>
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