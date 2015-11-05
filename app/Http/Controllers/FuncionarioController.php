<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends BaseController {

  public function __construct(Request $request, Funcionario $model){
    $this->_model = $model;
    parent::__construct($request);
  }




}
