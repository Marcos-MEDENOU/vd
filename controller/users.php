<?php
namespace controller;
session_start();
class users
{
    use crypt;
    private $model;
    function __construct()
    {
        $this->model = new \models\user();
        if (isset($GET['target'])) {
            $target = $this->datadecrypt($GET['target']);
            if ($this->$target()) {
                $this->$target();
            } else {
                $this->list();
            }
        }
    }
    public function list()
    { 
        echo "fait";
        // $adminUsername = $_SESSION['auth'];

        $data = $this->model->GetUser();
        
        include_once 'views/user-table.phtml';
    }
}
