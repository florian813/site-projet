<?php


namespace model;


class AccountModel
{
    static function check($firstname,$lastname,$mail,$password){
        // Connexion à la base de données
        $db = \model\Model::connect();

        // Requête SQL
        $sql="SELECT mail FROM account WHERE mail=$mail";

        // Exécution de la requête
        $req = $db->prepare($sql);
        $req->execute();
        $nbresult=$req->fetchAll();

        if(strlen($firstname)>=2 and strlen($lastname)>=2 and filter_var($mail,FILTER_VALIDATE_EMAIL) and $nbresult.length==0 and strlen($password)>=6){
            return true;
        }else{
            return false;
        }
    }

    static function signin($firstname,$lastname,$mail,$password){

        if(self::check($firstname,$lastname,$mail,$password)==true){
            // Connexion à la base de données
            $db = \model\Model::connect();
            // Requête SQL
            $sql="INSERT INTO account (firstname,lastname,mail,password)
                  VALUES ('$firstname','$lastname','$mail','$password');";

            // Exécution de la requête
            $req = $db->prepare($sql);
            $req->execute();
            return true;
        }
        else {
            return false;
        }
    }

    static function login($mail, $password){
        // Connexion à la base de données
        $db = \model\Model::connect();
        $mail=htmlspecialchars($mail);
        $password=htmlspecialchars($password);

        // Requête SQL
        $sql="SELECT * FROM account WHERE account.mail='$mail' AND account.password='$password';";

        // Exécution de la requête
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetch();
    }

    static function update($firstname,$lastname,$mail){
        $db = \model\Model::connect();
        $mail=htmlspecialchars($mail);
        $firstname=htmlspecialchars($firstname);
        $lastname=htmlspecialchars($lastname);
        $id=$_SESSION['id'];

        // Requête SQL
        $sql="UPDATE account SET firstname='$firstname',lastname='$lastname',mail='$mail' WHERE id='$id';";

        // Exécution de la requête
        $req = $db->prepare($sql);
        $req->execute();
        return $req->fetch();

    }
}