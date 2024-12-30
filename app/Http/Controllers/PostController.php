<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->get();

        // Phân biệt giao diện user và admin
        if ($request->route()->getName() === 'admin.posts.index') {
            return view('admin.posts.index', compact('posts')); // View dành cho admin
        }

        return view('pages.blog_default', compact('posts')); // View dành cho user
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . $file->getClientOriginalName(); // Đặt tên file duy nhất
            $file->move(public_path('frontend/images/'), $imageName); // Di chuyển file vào public/frontend/images
            $imagePath = $imageName; // Chỉ lưu tên file
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'author_id' => Auth::id(),  // Lưu ID của admin
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Bài viết đã được thêm thành công.');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Bài viết đã được xóa.');
    }
    public function edit($id)
    {
        // Tìm bài viết theo ID
        $post = Post::findOrFail($id);

        // Trả về view chỉnh sửa bài viết
        return view('admin.posts.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());

        return redirect()->route('admin.posts.index')->with('success', 'Bài viết đã được cập nhật!');
    }

}
