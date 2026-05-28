<?php

$action = $_GET['action'] ?? '/';

match ($action) {
    '/' => (new ProductController)->index(),
    
    'product-create' => (new ProductController)->create(),
    'product-store' => (new ProductController)->store(),
    'product-edit' => (new ProductController)->edit(),
    'product-update' => (new ProductController)->update(),
    'product-delete' => (new ProductController)->delete(),
    'product-show' => (new ProductController)->show(),
    default => (new ProductController)->index(),
};