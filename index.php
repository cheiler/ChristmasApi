<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require_once 'functions/errorHandler.php';
require_once 'functions/functions.php';




$app = new \Slim\App($config);

$app->get('/christmas', function (Request $request, Response $response){
    
    $unit = $request->getQueryParams()["unit"];
    
    $year = $request->getQueryParams()["year"];
    if($year===null){ $year=(int)date("Y");} //set current year as year
    
    //calculate time
    $cdate = mktime(0, 0, 0, 12, 25, $year);
    $today = time();
    $difference = $cdate - $today;
    if ($difference < 0) { $difference = 0; }
    $remaining = floor($difference/60/60/24);
    
    

    $ans->toChristmas=array("timeRemaining"=>$remaining, "unit"=>"days" );
    $ans->christmasDay=$cdate;
    $ans->year=$year;
    
    $response->withStatus(200, "Here is your user!");
    
    
    $response->withJson($ans);
    return $response;
});



$app->get('/doc/christmas', function (Request $request, Response $response){
    //$req->education = filter_var($request->getQueryParams()["education"], FILTER_VALIDATE_BOOLEAN);
    $id = (int)$request->getAttribute('id');

    $person = new person(1);
    
    
    
    $response->getBody()->write("This is a document");
    return $response;
});


$app->put('/person/{id}', function (Request $request, Response $response){
    //$req->education = filter_var($request->getQueryParams()["education"], FILTER_VALIDATE_BOOLEAN);
    $id = (int)$request->getAttribute('id');
    $person = new person(1);
//    if($id === $person->getId()){
//        //$response->withStatus(201);
//        echo "created";
//    } else {
//        
//    }
    $response->withJson($person);
    return $response;
});









$app->run();