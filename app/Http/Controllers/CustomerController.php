<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller {
    public function customerPage() {
        return view('pages.dashboard.customer-page');
    }

    /**
     * customer Created a newly created resource.
     */
    public function customerCreate(Request $request) {

        $user_id = $request->header('user_id');
        return Customer::create([
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'mobile'  => $request->input('mobile'),
            'user_id' => $user_id,
        ]);
    }

    /**
     * Customer list a newly created resource.
     */
    public function customerList(Request $request) {
        $user_id = $request->header('user_id');
        return Customer::where('user_id', $user_id)->get();
    }

    /**
     * customerByID a newly created resource.
     */
    public function customerById(Request $request) {
        $customer_id = $request->input('id');
        $user_id = $request->header('user_id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->first();

    }

    /**
     * Customer Update a newly created resource.
     */
    public function customerUpdate(Request $request) {
        $customer_id = $request->input('id');
        $user_id = $request->header('user_id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->update([
            'name'   => $request->input('name'),
            'email'  => $request->input('email'),
            'mobile' => $request->input('mobile'),
        ]);
    }

    /**
     * Customer delete a newly created resource.
     */
    public function customerDelete(Request $request) {
        $customer_id = $request->input('id');
        $user_id = $request->header('user_id');
        return Customer::where('id', $customer_id)->where('user_id', $user_id)->delete();
    }

}
