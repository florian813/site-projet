<?php


namespace controller;


class AccountController
{
    public function account(): void
    {
        // Variables à transmettre à la vue
        $params = [
            "title"  => "Account",
            "module" => "account.php"
        ];

        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);
    }

    public function signin(){
        $firstname=htmlspecialchars($_POST["userfirstname"]);
        $lastname=htmlspecialchars($_POST["userlastname"]);
        $mail=htmlspecialchars($_POST["usermail"]);
        $password=htmlspecialchars($_POST["userpass"]);

        $sign=\model\AccountModel::signin($firstname,$lastname,$mail,$password);
        if($sign==true){
            header('Location:/account?status=signin');
        }else{
            header('Location:/account?status=signin_fail');
        }
    }

    public function login(){
        $mailconnect=$_POST['usermail'];
        $passwordconnect=$_POST['userpass'];

        $log=\model\AccountModel::login($mailconnect,$passwordconnect);

        if($log!=null){
            $_SESSION['id']=$log['id'];
            $_SESSION['firstname']=$log['firstname'];
            $_SESSION['lastname']=$log['lastname'];
            $_SESSION['mail']=$log['mail'];
            header("Location: /store");
        }else{
            header("Location: /account?status=login_fail");
        }

    }

    public function logout(){
        session_destroy();
        header("Location:/account?status=logout");
}
    public function infos(){
        // Variables à transmettre à la vue
        $params = [
            "title"  => "Account",
            "module" => "infos.php"
        ];

        // Faire le rendu de la vue "src/view/Template.php"
        \view\Template::render($params);

    }

    public function update(){

        $firstname=$_POST['userfirstname'];
        $lastname=$_POST['userlastname'];
        $mail=$_POST['usermail'];

        \model\AccountModel::update($firstname,$lastname,$mail);
        $_SESSION['mail']=$mail;
        $_SESSION['firstname']=$firstname;
        $_SESSION['lastname']=$lastname;
        header("Location:/account/infos");
    }
}