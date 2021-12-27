<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    public function index()
    {
        /** @var Customer[] $customers */
        $customers = Customer::orderBy('id', 'desc')->paginate(50);
        return view('admin/customer-index')
            ->with('customers', $customers);
    }

    //show customer details
    public function show(Customer $customer)
    {
        return view('admin/customer-show')
            ->with('customer', $customer);
    }

    //delete customer
    public function destroy(Customer $customer)
    {
        $customer->delete();
        $message = 'Customer deleted successfully';
        Log::info($message);
        return redirect()->back()
            ->with('success', $message);
    }

    //edit customer
    public function edit(Customer $customer)
    {
        return view('admin/customer-edit')
            ->with('customer', $customer);
    }

    //update customer
    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());
        $message = 'Customer updated successfully';
        Log::info($message);
        return redirect()->back()
            ->with('success', $message);
    }
}
