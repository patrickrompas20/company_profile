<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:sliders.index|sliders.create|sliders.edit|sliders.delete']);
    }
    public function index()
    {
        // $search = request()->q;
        $sliders = Slider::latest()->when(request()->q, function ($sliders) {
            $sliders = $sliders->where('title', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'content' => 'required'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/sliders', $image->hashName());

        $slider = Slider::create([
            'image' => $image->hashName(),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);



        if ($slider) {
            return redirect()->route('admin.slider.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.slider.index')->with(['error' => 'Save Data Failed!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        // Update slider data
        $slider->title = $request->input('title');
        $slider->content = $request->input('content');


        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/sliders/' . basename($slider->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/sliders', $image->hashName());

            // Update slider dengan image yang baru
            $slider->image = $image->hashName();
        }
        $slider->save();

        if ($slider) {
            return redirect()->route('admin.slider.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.slider.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('local')->delete('public/sliders/' . basename($slider->image));
        $slider->delete();

        if ($slider) {
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
