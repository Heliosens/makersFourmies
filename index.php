<?php
session_start();
// database inclusion
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/assoDb.php';

// entities inclusions
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Action.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Article.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Image.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Matter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Origin.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Role.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Technic.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Tool.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Entity/Type.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/Entity/User.php";

// managers inclusions
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ActionManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ArticleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ImageManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/MatterManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/OriginManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/RoleManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/TechnicManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/ToolManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Model/Manager/TypeManager.php';
require_once $_SERVER['DOCUMENT_ROOT'] . "/Model/Manager/UserManager.php";

// controller inclusion
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/actionController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/formController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/partsController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/Controller/profileController.php";

// database connexion
$db = new assoDb();
$db = $db->connect();

$actionCtrl = new actionController($db);
$control = new controller();
$formCtrl = new formController($db);
$partsCtrl = new partsController($db);

// use $_GET['ctrl'] value to display the right page
if(isset($_GET['ctrl'])){
    switch ($_GET['ctrl']){
        // connexion
        case 'connexion-view' :
            // if an error occurs
            if(isset($_GET['error'])){
                switch ($_GET['error']){
                    // $_GET['error'] = mail-pass means error on mail or password
                    case 'mail-pass':
                        $control->render($_GET['ctrl'], 'Connexion', [
                            'info' => "L'adresse mail et/ ou le mot de passe est incorrecte"
                        ]);
                        break;
                    case 'form':
                        // $_GET['error'] = form means an incomplete form
                        $control->render($_GET['ctrl'], 'Connexion', [
                            'info' => "Le formulaire est incomplet"
                        ]);
                        break;
                }
            }
            // there's no error, is there validation (test = 1) ?
            elseif (isset($_GET['test']) == 1){
                $formCtrl->checkValidation($_GET['ctrl']);
            }
            else{
                // display connection form only if there's no test & no error
                $control->render($_GET['ctrl'], 'Connexion');
            }
            break;
        // inscription
        case 'register-view' :
            // if an error occurs...
            if(isset($_GET['error'])){
                switch ($_GET['error']){
                    case 'pseudo':
                        $control->render($_GET['ctrl'], 'Inscription', [
                            'info' => "Ce pseudo existe déjà"
                        ]);
                        break;
                    case 'mail':
                        $control->render($_GET['ctrl'], 'Inscription', [
                            'info' => "adresse mail incorrecte"
                        ]);
                        break;
                    case 'add':
                        $control->render($_GET['ctrl'], 'Inscription', [
                            'info' => "erreur lors de l'inscription"
                        ]);
                        break;
                    case 'form':
                        $control->render($_GET['ctrl'], 'Inscription', [
                            'info' => "formulaire incomplet"
                        ]);
                        break;
                }
            }
            // if there's no error & validation test = 1
            elseif (isset($_GET['test']) == 1){
                $formCtrl->checkValidation($_GET['ctrl']);
            }
            else{
                // display inscription form
                $control->render($_GET['ctrl'], 'Inscription');
            }
            break;
        // available pages
        // asso
        case 'asso-view' :
            // display asso page
            if(isset($_GET['connect']) && $_GET['connect'] == 0){
                $control->disconnect();
            }
            $control->render($_GET['ctrl'], 'Association Makers Fourmies');
            break;
        // resource
        case 'resource-view' :
            $control->render($_GET['ctrl'], 'Association Makers Fourmies');
            break;
        // gallery
        case 'gallery-view' :
            $var = $partsCtrl->displayImage();
            $control->render($_GET['ctrl'],'Galerie', $var);
            break;
        // contact
        case 'contact-view' :
            $control->render($_GET['ctrl'],'Contact & adhésion');
            break;
        //user-view
        case 'profile-view' :
            // if admin or if it's user's profil
            $control->render($_GET['ctrl'], 'profil');
            break;
        // for user, maker, modo, admin
        // projects page
        case 'action-view' :
            // not available for visitor
            if(isset($_SESSION['user']) && $_SESSION['user']['role'] < 4){
                $var = $partsCtrl->displayAction();
                $control->render($_GET['ctrl'],'Les projets des makers', $var);
            }
            else{
                $control->render('error-view','Association Makers Fourmies', [
                    "Vous n'avez pas accès à la page demandée"
                ]);
            }
            break;
        // one project page for maker only
        case 'oneProject-view' :
            // not available for user, not available if role is <= à 4
            if(isset($_SESSION['user']) && $_SESSION['user']['role'] < 4){
                $control->render($_GET['ctrl'], 'projet de maker fourmies');
            }
            else{
                $control->render('error-view','Association Makers Fourmies', [
                    "Vous n'avez pas accès à la page demandée"
                ]);
            }
            break;
        // admin
        case 'admin-view' :
            // if role = admin
            if(isset($_SESSION['user']) && $_SESSION['user']['role'] < 2){
                $control->render($_GET['ctrl'], 'admin');
            }
            else{
                $control->render('error-view','Association Makers Fourmies', [
                    "Vous n'avez pas accès à la page demandée"
                ]);
            }
            break;
        // asso
        default :
            $control->render('asso-view','Association Makers Fourmies');
    }
}
else{
    $control->render('asso-view','Association Makers Fourmies');
}
