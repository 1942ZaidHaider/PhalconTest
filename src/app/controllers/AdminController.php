<?php

use Phalcon\Mvc\Controller;

class AdminController extends Controller
{

    public function indexAction()
    {
        $users = Users::find();
        $this->view->users = $users;
    }
    public function deleteAction($id)
    {
        echo "hi";
        print_r(Users::find_by_id($id));
    }
}
