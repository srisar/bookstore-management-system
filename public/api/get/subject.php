<?php

use App\Core\Authentication;
use App\Core\Requests\JSONResponse;
use App\Core\Requests\Request;
use App\Models\Subject;

require_once "../../../_bootstrap.inc.php";

Authentication::isAdminOrRedirect();

try{

    $id = Request::getAsInteger('id');

    if(empty($id)) throw new Exception('Invalid ID');

    JSONResponse::validResponse(['data' => Subject::find($id)]);

}catch (Exception $exception){
    JSONResponse::exceptionResponse($exception);
}