<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\CartService;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng :  ' . $customer->name,
            'customer' => $customer,
            'carts' => $customer->carts()->get()
        ]);
    }

    public function updateCustomerStatus($customer_id,$status)
    {
        $customer = Customer::find($customer_id);
        $customer->status=$status;
        if($status == "delivered")
        {
            $customer->delivered_date = DB::raw('CURRENT_DATE');
        }
        else if($status == "canceled")
        {
            $customer->canceled_date = DB::raw('CURRENT_DATE');
        }
        $customer->save();
        session()->flash('customer_message','Đã Cập Nhật Trạng Thái Thành Công');
    }
}
