<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class IndexController extends Controller
{
    public function indexAction()
    {

    }
    public function testAction($a)
    {
        echo $a;
    }
    public function dostAction()
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

    }
}
