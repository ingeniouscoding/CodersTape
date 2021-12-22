<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Events\NewCustomerHasRegisteredEvent;

class CustomersController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();
        $customer = new Customer();

        return view('customers.create', compact('companies', 'customer'));
    }

    public function store()
    {
        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

        return redirect('customers');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        $companies = Company::all();

        return view('customers.edit', compact('companies', 'customer'));
    }

    public function update(Customer $customer)
    {
        $customer->update($this->validateRequest());
        $this->storeImage($customer);

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers');
    }

    private function storeImage($customer)
    {
        if (request()->has('image')) {
            $customer->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }


    private function validateRequest()
    {
        return tap(request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]), function () {
            if (request()->hasFile('image')) {
                request()->validate([
                    'image' => 'mimes:jpeg,jpg,png,bmp|max:5000',
                ]);
            }
        });
    }
}
