<?php

namespace App\Http\Controllers\Api\V1;

use App\models\CustomerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerCollection;
class CustomerController extends Controller{

    public function  __construct(CustomerRepository $customers){
        $this->customers = $customers;
    }

    public function index($sellerId){
        $customers = $this->customers->getCustomersBySeller($sellerId)->get();
        return new CustomerCollection($customers);
    }
}
