<?php


namespace controller;


class CommentController
{
    public function postComment(){
        if(!isset($_SESSION)){
            header("location: /account");
            exit();
        }
        $product=$_SESSION["productid"];
        $account=$_SESSION['id'];
        $content=htmlspecialchars($_POST["writecomment"]);

        \model\CommentModel::insertComment($content,$product,$account);

            header("Location: /store/".$product );
            exit();
    }
}