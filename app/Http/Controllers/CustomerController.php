<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends BaseController {

  public function __construct(Request $request, Customer $model){
    $this->_model = $model;
    parent::__construct($request);
  }




}
