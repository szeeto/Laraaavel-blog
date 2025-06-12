<?php

namespace App\Http\Controllers\Member;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = Post::where('user_id',$user->id)->orderBy('id','asc')->paginate(5);
        return view('member.blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data = $post;

        return view('member.blogs.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:4096'
        ],[
            'title.required' => 'Judul wajib diisi',
            'content.required' => 'Konten wajib diisi',
            'thumbnail.image' => 'Harus berupa gambar',
            'thumbnail.mimes' => 'Harus berupa file JPG, JPEG, atau PNG',
            'thumbnail.max' => 'Ukuran file maksimal 4MB'
        ]);

        if ($request->hasFile('thumbnail')){
            $image = $request->file('thumbnail');
            $image_name = time()."_".$image->getClientOriginalName();
            $destinationPath = public_path('thumbnails');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $image->move($destinationPath, $image_name);
        } else {
            $image_name = $post->thumbnail;
        }

        $data=[
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'status' => $request->status,
            'thumbnail' => isset($image_name) ? $image_name : $post->thumbnail,
        ];

        Post::where('id',$post->id)->update($data);
        return redirect()->route('member.blogs.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
