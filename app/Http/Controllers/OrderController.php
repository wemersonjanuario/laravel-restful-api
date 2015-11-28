<?php namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends BaseController {

  public function __construct(Request $request, Order $model){
    $this->_model = $model;
    parent::__construct($request);
  }




}
