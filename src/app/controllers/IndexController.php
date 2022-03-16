<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class IndexController extends Controller
{
    public function indexAction()
    {
        print_r($_POST);
        $put = "";
        $put .= "<pre>Output:";
        //echo "<pre id='output'></pre>";
        $put .= "<script>
            function print(str)
            {
                document.getElementById('output').innerHTML=str;
            }\n";
        $put .= $_POST['Coprus'] . "\n";
        $put .= "</script>";
        $put .= "</pre>";
        $this->view->put=$put;
        $this->view->post=$_POST['Coprus'];
    }
    public function testAction($a)
    {
        echo "<h2>$a<h2>";
    }
    public function dostAction()
    {
        print_r($_POST);
        echo "<pre>Output:";
        echo "<pre id='output'></pre>";
        echo "<script>
            function print(str)
            {
                document.getElementById('output').innerHTML=str;
            }\n";
        echo $_POST['Coprus'] . "\n";
        echo "</script>";
        echo "</pre>";
    }
}
