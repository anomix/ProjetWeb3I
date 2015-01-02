<h2>Inscription </h2>

<div id="inscription_nm">
    <section id="message"><?php if(isset($message)) print $message;?></section>
    <form action="<?php print $_SERVER['PHP_SELF']; ?>" method='post' id="form_inscription">
        <table>
            <tr>
                <td>Nom: </td>
                <td><input type="text" id="nom_user" name="nom_user"/></td>
            </tr>
            <tr>
                <td>Prénom: </td>
                <td><input type="text" id="prenom_user" name="prenom_user"/></td>
            </tr>
            <tr>
                <td>Téléphone: </td>
                <td><input type="text" id="phone" name="phone"/></td>
            </tr>
            <tr>
                <td>Nom de rue: </td>
                <td><input type="text" id="nom_rue" name="nom_rue"/></td>
            </tr>
            <tr>
                <td>Numero de rue: </td>
                <td><input type="text" id="numero_rue" name="numero_rue"/></td>
            </tr>
            <tr>
                <td>Ville: </td>
                <td><input type="text" id="ville" name="ville"/></td>
            </tr>
            <tr>
                <td>Pays: </td>
                <td><input type="text" id="pays" name="pays"/></td>
            </tr>
            <tr>
                <td>Pseudo: </td>
                <td><input type="text" id="pseudo" name="pseudo"/></td>
            </tr>
            <tr>
                <td>Mot de passe: </td>
                <td><input type="password" id="passord" name="password"/></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit_inscription" id="submit_inscription" value="Valider"/>
                </td>
            </tr>
        </table>
    </form>
</div>
