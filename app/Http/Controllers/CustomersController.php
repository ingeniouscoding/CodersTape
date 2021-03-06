<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Symfony\Component\VarDumper\Cloner\Data;
use App\Events\NewCustomerHasRegisteredEvent;
use App\Policies\CustomerPolicy;

class CustomersController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::with('company')->paginate(15);

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
        $this->authorize('create', Customer::class);

        $customer = Customer::create($this->validateRequest());
        $this->storeImage($customer);

        NewCustomerHasRegisteredEvent::dispatch($customer);

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
        $this->authorize('delete', $customer);

        $customer->delete();

        return redirect('customers');
    }

    private function storeImage(Customer $customer)
    {
        if (!request()->has('image')) {
            return;
        }

        $customer->update([
            'image' => request()->image->store('uploads', 'public'),
        ]);

        $image = Image::make(public_path('storage/' . $customer->image))->fit(300, 300);
        $image->save();
    }


    private function validateRequest()
    {
        return request()->validate([
            'name'       => 'required|min:3',
            'email'      => 'required|email',
            'active'     => 'required',
            'company_id' => 'required',
            'image'      => 'sometimes|mimes:jpeg,jpg,png,bmp|max:5000',
        ]);
    }
}
