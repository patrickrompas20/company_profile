<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Post;
use App\Models\Team;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['permission:posts.index|posts.create|posts.edit|posts.delete']);
    }
    public function index()
    {
        // Searching
        $posts = Post::latest()->when(request()->q, function ($query, $searchTerm) {
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('content', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('tags', function ($subQuery) use ($searchTerm) {
                        $subQuery->where('name', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('category', function ($subQuery) use ($searchTerm) {
                        $subQuery->where('name', 'like', '%' . $searchTerm . '%');
                    });
            });
        })->paginate(5);

        return view('admin.post.index', compact('posts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::latest()->get();
        $teams = Team::latest()->get();
        return view('admin.post.create', compact('categories', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi form
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required',
            'category_id' => 'required',
            'team_id' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        // create post
        $post = Post::create([
            'image' => $image->hashName(),
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'team_id' => $request->input('team_id'),
            'date' => $request->input('date'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('title')),
        ]);


        if ($post) {
            return redirect()->route('admin.post.index')->with(['success' => 'Save Data Successsfully!']);
        } else {
            return redirect()->route('admin.post.index')->with(['error' => 'Save Data Failed!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::latest()->get();
        $teams = Team::latest()->get();
        return view('admin.post.edit', compact('post', 'categories', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required',
            'team_id' => 'required',
            'date' => 'required',
            'content' => 'required',
        ]);

        // Update Post data
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->team_id = $request->input('team_id');
        $post->date = $request->input('date');
        $post->content = $request->input('content');
        $post->slug = Str::slug($request->input('title'));

        // Update image jika ada image baru
        if ($request->hasFile('image')) {
            // Validasi image baru
            $this->validate($request, [
                'image' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);

            // Hapus image lama
            Storage::disk('local')->delete('public/posts/' . basename($post->image));

            // Upload image baru
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            // Update post dengan image yang baru
            $post->image = $image->hashName();
        }
        $post->save();

        if ($post) {
            return redirect()->route('admin.post.index')->with(['success' => 'Update Data Successfully!']);
        } else {
            return redirect()->route('admin.post.index')->with(['error' => 'Update Data Failed!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Storage::disk('local')->delete('public/posts/' . basename($post->image));
        $post->delete();

        if ($post) {
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
