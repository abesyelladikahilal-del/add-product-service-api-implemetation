<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
{
    // basic filter (optional) supaya search & status tetap bekerja
    $query = Customer::query();

    if ($request->filled('q')) {
        $q = $request->q;
        $query->where(function($q2) use ($q) {
            $q2->where('name', 'like', "%{$q}%")
               ->orWhere('email', 'like', "%{$q}%")
               ->orWhere('company', 'like', "%{$q}%");
        });
    }

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // gunakan paginate agar pagination di view tetap bekerja
    $customers = $query->latest()->paginate(10);

    // siapkan stats yang dipakai di view
    $stats = [
        'total'    => Customer::count(),
        'active'   => Customer::where('status', 'Active')->count(),
        'inactive' => Customer::where('status', 'Inactive')->count(),
    ];

    return view('customers.index', compact('customers', 'stats'));
}

    public function create()
    {
        // tampilkan halaman form tambah
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'company' => 'required',
            'phone'   => 'required',
            'email'   => 'required|email',
            'country' => 'required',
            'status'  => 'required'
        ]);

        Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(Customer $customer)
    {
        // tampilkan halaman edit
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validated = $request->validate([
            'name'    => 'required',
            'company' => 'required',
            'phone'   => 'required',
            'email'   => 'required|email',
            'country' => 'required',
            'status'  => 'required'
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
