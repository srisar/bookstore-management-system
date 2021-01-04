<?php

use App\Core\Authentication;
use App\Core\Requests\JSONResponse;
use App\Core\Requests\Request;
use App\Models\Book;
use App\Models\BookPurchase;

require_once "../../_bootstrap.inc.php";

Authentication::isAdminOrRedirect();

try{


    JSONResponse::validResponse(['data' => BookPurchase::findAll()]);

}catch (Exception $exception){
    JSONResponse::exceptionResponse($exception);
}