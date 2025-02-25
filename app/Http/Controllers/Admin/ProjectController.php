<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:projects.index|projects.create|projects.edit|projects.delete']);
    }
    public function index()
    {
        // $search = request()->q;
        $projects = Project::latest()->when(request()->q, function ($projects) {
            $projects = $projects->where('title', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'description' => 'required'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/projects', $image->hashName());

        $project = Project::create([
            'image' => $image->hashName(),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);



        if ($project) {
            return redirect()->route('admin.project.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.project.index')->with(['error' => 'Save Data Failed!']);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ]);

        // Update project data
        $project->title = $request->input('title');
        $project->description = $request->input('description');


        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/projects/' . basename($project->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/projects', $image->hashName());

            // Update project dengan image yang baru
            $project->image = $image->hashName();
        }
        $project->save();

        if ($project) {
            return redirect()->route('admin.project.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.project.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        Storage::disk('local')->delete('public/projects/' . basename($project->image));
        $project->delete();

        if ($project) {
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
