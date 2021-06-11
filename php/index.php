<?php

// form for search and show list
require('../.apifunc/apifunc.php');

try {
    // how to load composer packages?
//    let_html([
    apifunc([
        'https://php.parkingomat.com/header.php',
        'https://php.parkingomat.com/post.php',
        'https://php.parkingomat.com/form.php',
        'https://php.parkingomat.com/footer.php',
    ], function () {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo "GET: ";
            var_dump($_GET);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "POST: ";
            var_dump($_POST);
        }
    }, '../.apifunc');

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    echo "ERROR: ". $e->getMessage();
}
