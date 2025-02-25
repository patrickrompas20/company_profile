<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:teams.index|teams.create|teams.edit|teams.delete']);
    }
    public function index()
    {
        $teams = Team::latest()->when(request()->q, function ($teams) {
            $teams = $teams->where('fullname', 'like', '%' . request()->q . '%');
        })->paginate(5);
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function create()
    {
        $teams = Team::latest()->get();
        return view('admin.team.create', compact('teams'));
    }


    public function store(Request $request, Team $team)
    {
        // validasi form
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'fullname' => 'required',
            'jabatan' => 'required',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable'
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/teams', $image->hashName());

        // create team
        $team = Team::create([
            'image' => $image->hashName(),
            'fullname' => $request->input('fullname'),
            'jabatan' => $request->input('jabatan'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
            'linkedin' => $request->input('linkedin'),
            'slug' => Str::slug($request->input('fullname')),
        ]);


        if ($team) {
            return redirect()->route('admin.team.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.team.index')->with(['error' => 'Save Data Failed!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'jabatan' => 'required',
            'facebook' => 'nullable',
            'twiiter' => 'nullable',
            'instagram' => 'nullable',
            'linkedin' => 'nullable'
        ]);

        // Update Team data
        $team->fullname = $request->input('fullname');
        $team->jabatan = $request->input('jabatan');
        $team->facebook = $request->input('facebook');
        $team->twitter = $request->input('twitter');
        $team->instagram = $request->input('instagram');
        $team->linkedin = $request->input('linkedin');
        $team->slug = Str::slug($request->input('fullname'));

        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/teams/' . basename($team->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/teams', $image->hashName());

            // Update team dengan image yang baru
            $team->image = $image->hashName();
        }
        $team->save();

        if ($team) {
            return redirect()->route('admin.team.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.team.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        Storage::disk('local')->delete('public/teams/' . basename($team->image));
        $team->delete();

        if ($team) {
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
