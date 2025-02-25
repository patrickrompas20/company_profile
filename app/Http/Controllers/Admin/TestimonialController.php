<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Storage;


class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:testimonials.index|testimonials.create|testimonials.edit|testimonials.delete']);
    }
    public function index()
    {
        // $search = request()->q;
        $testimonials = Testimonial::latest()->when(request()->q, function ($testimonials) {
            $testimonials = $testimonials->where('name', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required',
            'profession' => 'required',
            'star' => 'required',
            'content' => 'required'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/testimonials', $image->hashName());

        $testimonial = Testimonial::create([
            'image' => $image->hashName(),
            'name' => $request->input('name'),
            'profession' => $request->input('profession'),
            'star' => $request->input('star'),
            'content' => $request->input('content'),
        ]);



        if ($testimonial) {
            return redirect()->route('admin.testimonial.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.testimonial.index')->with(['error' => 'Save Data Failed!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
            'star' => 'required',
            'content' => 'required',
        ]);

        // Update testimonial data
        $testimonial->name = $request->input('name');
        $testimonial->profession = $request->input('profession');
        $testimonial->star = $request->input('star');
        $testimonial->content = $request->input('content');


        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/testimonials/' . basename($testimonial->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/testimonials', $image->hashName());

            // Update testimonial dengan image yang baru
            $testimonial->image = $image->hashName();
        }
        $testimonial->save();

        if ($testimonial) {
            return redirect()->route('admin.testimonial.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.testimonial.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        Storage::disk('local')->delete('public/testimonials/' . basename($testimonial->image));
        $testimonial->delete();

        if ($testimonial) {
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
