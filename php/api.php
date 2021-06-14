<?php

// Install apifunc loader: .apifunc\\install.bat

// Load composer packages
require('../vendor/autoload.php');

// load files local from .apifunc folder and remote from https://*
require('../.apifunc/apifunc.php');


use letjson\LetJson;

try {
    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'https://php.eachfunc.com/each_func.php',
        'https://domain.phpfunc.com/get_domain_by_url.php',
        'https://domain.phpfunc.com/clean_url.php',
        'https://php.parkingomat.com/getDomainsFromHost.php',
        'https://php.parkingomat.com/header_json.php',
    ], function () {

        if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
            header_json([
                'message' => 'The Request is not GET METHOD',
                'error' => true
            ]);
        }

        $objs = new LetJson("../../plesk.json");

        if (empty($_GET['hostname'])) {
            $data = [];
            $objs->each(function ($obj) {
                global $data;
                $data[] = getDomainsFromHost($obj, []);
            });
            global $data;
            header_json($data);

        } else {
            $objs->each(function ($obj) {
                if ($obj->host === $_GET['hostname']) {
                    $data = getDomainsFromHost($obj, []);
                    header_json($data);
                }
            });
        }

    }, '../.apifunc');

} catch (Exception $e) {
    // Set HTTP response status code to: 500 or show Message about Internal Server Error
    header_json([
        'message' => $e->getMessage(),
        'error' => true
    ]);
}

