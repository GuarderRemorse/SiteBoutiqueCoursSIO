<!-- CORPS de la page-->
<section class="connexion">
    <div class="titre">
        Administration du site (Accès réservé)
    </div>
    <form method="POST" action="index.php?controleur=admin&action=verifierConnexion">
        <fieldset>
            <legend>Identification</legend>
            <label for="login">Votre login :</label>
            <input type="text" name="login" id="login" /> <br />
            <label for="passe">Votre mot de passe :</label>
            <input type="password" name="passe" id="passe" /><br />
            <input type="checkbox" name="connexion_auto" id="connexion_auto" /><label for="connexion_auto" class="enligne"> Connexion automatique </label><br />
            </div>
        </fieldset>
        <input type="submit" value="Connexion" />
    </form>
</section>