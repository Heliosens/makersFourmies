<?php


class controller {

    // display a form-part of bigger form like connexion is in inscription
    // like action is divided on sub-form
    /**
     * @param string $part
     * @param string $title
     * @param array $var
     */
    public function partRender (string $part, string $title, array $var = []){
        require_once $_SERVER['DOCUMENT_ROOT'] . "/view/formParts/" . $part . ".php";
    }

    /**
     * display asked page - set title - give data in array
     * @param string $page
     * @param string $title
     * @param array $var
     */
    public function render(string $page, string $title, array $var = []) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/header.php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/" . $page . ".php";
        require_once $_SERVER['DOCUMENT_ROOT'] . "/View/partials/footer.php";
    }

    /**
     * are there data and are they complete ?
     * @param mixed ...$data
     * @return bool
     */
    public function checkData(...$data): bool {
        foreach ($data as $input) {
            // is data exist ? is data not empty ?
            return !isset($_POST[$input]) ? false : (empty($_POST[$input]) ? false : true);
        }
        return true;
    }

    /**
     * stop the session
     */
    public function disconnect (){
        session_start();
        session_unset();
        header('Location: /index.php?ctrl=asso-view');
    }

}