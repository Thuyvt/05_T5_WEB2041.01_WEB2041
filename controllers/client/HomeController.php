<?php

class HomeController
{
    private $productModel;

    public function __construct() {
        $this->productModel = new ProductModel();
    }
    public function index() 
    {   
        $view = 'home';
        $top4Hot = $this->productModel->getTop4Hot();
        require_once PATH_VIEW_MAIN_CLIENT;
    }
}