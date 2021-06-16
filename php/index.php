<?php

error_reporting(E_ERROR | E_PARSE);
require('../.apifunc/apifunc.php');

try {
    //TODO: how to load composer packages?

    apifunc([
        'https://php.parkingomat.com/header.php',
        'https://php.parkingomat.com/post.php',
        'https://php.parkingomat.com/form.php',
        'https://php.parkingomat.com/footer.php',
//        'https://php.letxml.com/let_xml.php',
        'https://php.lettxt.com/let_txt.php',
    ], function () {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            echo "GET: ";
            var_dump($_GET);
            echo let_txt(['https://php.parkingomat.com/form.php']);
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            echo "POST: ";
            var_dump($_POST);
            echo let_txt(['https://php.parkingomat.com/post.php']);
        }
    }, '../.apifunc');

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    echo "ERROR: ". $e->getMessage();
}
