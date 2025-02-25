<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:facts.index|facts.create|facts.edit|facts.delete']);
    }
    public function index()
    {
        // $search = request()->q;
        $facts = Fact::latest()->when(request()->q, function ($facts) {
            $facts = $facts->where('success_customers', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.fact.index', compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'success_customers' => 'required',
            'successful_business' => 'required',
            'total_clients' => 'required',
            'satisfied_reviews' => 'required',
        ]);

        $fact = Fact::create([
            'success_customers' => $request->input('success_customers'),
            'successful_business' => $request->input('successful_business'),
            'total_clients' => $request->input('total_clients'),
            'satisfied_reviews' => $request->input('satisfied_reviews'),
        ]);



        if ($fact) {
            return redirect()->route('admin.fact.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.fact.index')->with(['error' => 'Save Data Failed!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fact $fact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fact $fact)
    {
        return view('admin.fact.edit', compact('fact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fact $fact)
    {
        $this->validate($request, [
            'success_customers' => 'required',
            'successful_business' => 'required',
            'total_clients' => 'required',
            'satisfied_reviews' => 'required',
        ]);

        $fact = Fact::findOrFail($fact->id);

        $fact->update([
            'success_customers' => $request->input('success_customers'),
            'successful_business' => $request->input('successful_business'),
            'total_clients' => $request->input('total_clients'),
            'satisfied_reviews' => $request->input('satisfied_reviews'),
        ]);



        if ($fact) {
            return redirect()->route('admin.fact.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.fact.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fact = Fact::findOrFail($id);
        $fact->delete();

        if ($fact) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
