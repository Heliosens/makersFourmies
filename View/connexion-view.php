
<main>
    <!-- connexion form -->
    <form id="frameForm" class="formTest" method="post" action="/index.php?ctrl=connexion-view&test=1">
        <div>
            <label for="mail">Email</label>
            <input type="email" name="mail" id="mail">
        </div>
        <div>
            <label for="passW">Mot de passe</label>
            <input id="passW" type="password" name="passW">
        </div>
        <div>
            <button id="validate" name="connect">valider</button>
        </div>
    </form>

    <!-- display error message -->
    <?php
    if(isset($var['info'])){?>
        <div id="errorText"><?=
        $var['info'];?>
        </div><?php
    }?>
</main>