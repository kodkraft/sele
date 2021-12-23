<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        /** @var Customer[] $customers */
        $customers = Customer::orderBy('id', 'desc')->paginate(50);
        return view('admin/customer-index')
            ->with('customers', $customers);
    }
}
