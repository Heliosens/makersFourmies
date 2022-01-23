<main>
    <div class="part">
        <h3>MODE ADMINISTRATEUR</h3>
    </div>

    <!-- principals entities -->
    <ul id="first">
        <li class="entity">User</li>
        <li class="entity">Action</li>
        <li id="others">Base de données</li>
    </ul>

    <!-- operation -->
    <div id="operation">
        <a class="action menu" href="/index.php?ctrl=admin-view&action=add" >
            <span>Ajouter</span>
        </a>
        <a class="action menu" href="/index.php?ctrl=admin-view">
            <span>Voir la liste</span>
        </a>
        <a class="action menu" href="/index.php?ctrl=admin-view">
            <span>Mettre à jour</span>
        </a>
        <a class="action menu" href="/index.php?ctrl=admin-view">
            <span>Supprimer</span>
        </a>
    </div>

    <?php
    // formController display good form
    require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/assoDb.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/formController.php";

    $db = new assoDb();
    $db = $db->connect();

    $formCtrl = new formController($db);

    //    $refForm = 'action';
    if(isset($_GET['action'])){?>
    <div id="frameForm"><?php
        switch ($_GET['action']){
            case 'add' :
                $formCtrl->partRender('actionForm', 'PUBLIER UNE ACTION');
        }?>
    </div><?php
}?>
</main>
