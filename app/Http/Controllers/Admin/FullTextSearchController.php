<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class FullTextSearchController extends Controller
{
    public function index(SearchRequest $request)
    {
        $products = Product::search($request->search)
            ->paginate(100);

        $categories = Category::search($request->search)
            ->paginate(100);

        $customers = Customer::search($request->search)
            ->paginate(100);

        //get all customers from its user email is like the search
        $customers2 = Customer::whereHas('user', function ($query) use ($request) {
            $query->where('email', 'like', '%' . $request->search . '%');
        })->paginate(100);

        $orders = Order::search($request->search)
            ->paginate(100);

        $customers = $customers->merge($customers2);



        return view('admin/search-index')
            ->with('products', $products)
            ->with('orders', $orders)
            ->with('categories', $categories)
            ->with('customers', $customers);
    }
}
