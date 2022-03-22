<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
        $post = $_POST ?? array();
        echo "<pre>";
        print_r($post);
        echo "</pre>";
        // die();
        if (count($post) > 0) {
            $email = $post['email'];
            $pass = $post['pass'];
            $user = new Users();
            $user = $user->findFirst(array(
                'conditions' => "email = ?1 and pass = ?2",
                'bind' => array("1" => $email, '2' => $pass)
            ));
            if (isset($user)) {
                $_SESSION['user'] = get_object_vars($user);

                echo "<pre>";
                print_r($user);
                echo "</pre>";
                //die();
                header('location: /');
            } else {
                $this->view->data = "fail";
            }
        }
    }
    public function logoutAction()
    {
        session_destroy();
        session_start();
        $_SESSION=array();
        header("location: /");
    }
}
