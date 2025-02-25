<?php

namespace App\Http\Controllers\Admin;

use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:services.index|services.create|services.edit|services.delete']);
    }

    public function index()
    {
        $services = Service::latest()->when(request()->q, function ($services) {
            $services = $services->where('name', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'icon' => 'required',
            'content' => 'required',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/services', $image->hashName());

        // create Service
        $service = Service::create([
            'image' => $image->hashName(),
            'name' => $request->input('name'),
            'icon' => $request->input('icon'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('name')),
        ]);

        if ($service) {
            return redirect()->route('admin.service.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.service.index')->with(['error' => 'Save Data Failed!']);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
            'content' => 'required',
        ]);

        // Update service data
        $service->name = $request->input('name');
        $service->icon = $request->input('icon');
        $service->content = $request->input('content');


        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/services/' . basename($service->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/services', $image->hashName());

            // Update service dengan image yang baru
            $service->image = $image->hashName();
        }
        $service->save();

        if ($service) {
            return redirect()->route('admin.service.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.service.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        Storage::disk('local')->delete('public/services/' . basename($service->image));
        $service->delete();

        if ($service) {
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
