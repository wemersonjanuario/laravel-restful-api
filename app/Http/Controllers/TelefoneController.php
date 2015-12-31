<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends BaseController {

  public function __construct(Request $request, Telefone $model){
    $this->_model = $model;
    parent::__construct($request);
  }






}
