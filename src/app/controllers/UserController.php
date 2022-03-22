<?php

use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\Model as mo;

class UserController extends Controller
{

    public function indexAction($page = 1)
    {
        $paginator = new mo(
            [
                "model"  => Users::class,
                "limit" => 5,
                "page"  => $page
            ]
        );

        $paginate = $paginator->paginate();
        echo "<pre>";
        print_r($paginate->items);
        echo "</pre>";
        //die();
        $this->view->users = $paginate->items;
        $this->view->paginate = $paginate;
    }
    public function deleteAction($id, $page)
    {
        $user = Users::find(array("conditions" => "id = $id"))[0];
        $user->delete();
        //$this->view->data=$user;
        header("location: /user/index/$page");
    }
    public function editAction($id, $page)
    {
        $user = Users::find(array("conditions" => "id = $id"))[0];
        $this->view->data = $user;
        $post = $this->request->getPost();
        if ($this->request->isPost()) {
            $user->assign(
                $post,
                [
                    "name", 'email', 'pass'
                ]
            );
            $success = $user->save();
            if ($success) {
                header('location: /user/index/' . $page);
            }
        }
    }
    public function signupAction()
    {
        if (isset($_POST['pass'])) {
            $user = new Users();
            $user->assign(
                $this->request->getPost(),
                [
                    'name',
                    'email',
                    "pass"
                ]
            );
            $success = $user->save();
            $this->view->success = $success;
            $this->view->message = $success==1?"Signup Successful":"Signup Failed<br>"
                .implode('<br>', $user->getMessages());
            $this->view->class = $success==1?"success":"danger";
        }
    }
}
