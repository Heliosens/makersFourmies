<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <div id="container">
        <header>
            <div id="row">
                <div class="side">
                    <a href="/index.php?ctrl=asso-view">
                        <img id="logo" src="/img/gears.png" alt="logo"/>
                    </a>
                </div>
                <div id="title">
                    <a href="/index.php?ctrl=asso-view">
                        <h1>MAKERS FOURMIES</h1>
                    </a>
                </div>
                <div class="side">
                    <div id="item">
                        <?php
                        if(isset($_SESSION['user'])){?><!--     if $_session exist then display... -->
                            <div id="helloUser"><!-- ...user name (= profile link)    -->
                                    <span>Bonjour, </span>
                                    <a href="/index.php?ctrl=profile-view" title="mon profil">
                                        <?= $_SESSION['user']['pseudo']?>
                                    </a>
                            </div>

                            <div id="userRole"><!-- ...user role, disconnect button    -->
                                <?php
                                // switch button function of role
                                switch ($_SESSION['user']['role']){
                                //  for administrator
                                    case 1 :?>
                                        <a href="/index.php?ctrl=admin-view">
                                            <button class="btn" type="button">Admin</button>
                                        </a><?php
                                        break;
                                //  for Maker
                                    case 3 :?>
                                        <p>Maker</p>
                                        <?php
                                        break;
                                //  nothing for user
                                    }?>
                                    <a href="/index.php?ctrl=asso-view&connect=0">
                                        <button class="btn" type="button">Déconnexion</button>
                                    </a>
                            </div>
                        <?php
                        }
                        else{?>
                            <!--     if $_session not exist then display connexion & inscription button    -->
                            <div id="connexionButton">
                                <a href="/index.php?ctrl=connexion-view">
                                    <button class="btn" type="button">Connexion</button>
                                </a>
                                <a href="/index.php?ctrl=register-view">
                                    <button class="btn" type="button">Inscription</button>
                                </a>
                            </div>
                            <?php
                            };?>
                    </div>
                </div>
            </div>
            <!-- tabs -->
            <nav>
                <a href="/index.php?ctrl=asso-view" class="menu">
                    <div>Association</div>
                </a>
                <a href="/index.php?ctrl=resource-view" class="menu">
                    <div>Ressource</div>
                </a>
                <a href="/index.php?ctrl=gallery-view" class="menu">
                    <div>Galerie</div>
                </a>
                <a href="/index.php?ctrl=contact-view" class="menu">
                    <div>Contact</div>
                </a>
                <!--   for maker only : role = 1 ou 2 ou 3          -->
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user']['role'] < 4){?>
                        <a href="/index.php?ctrl=action-view" class="menu">
                            <div>Les actions</div>
                        </a><?php
                    }?>
            </nav>
        </header>
