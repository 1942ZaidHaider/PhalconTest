<?php

use Phalcon\Mvc\Controller;
use Phalcon\Paginator\Adapter\Model as mo;


class AdminController extends Controller
{

    public function indexAction($page = 1)
    {
        $paginator = new mo(
            [
                "model"  => Users::class,
                "limit" => 1,
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
        header("location: /admin/index/$page");
    }
}
