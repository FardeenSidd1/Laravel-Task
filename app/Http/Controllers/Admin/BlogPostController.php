<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = '')
    {
        $blogPost = '';
        if (!empty($id)) {
            $blogPost = BlogPost::find($id);
        }
        return view('admin.blog.create', compact('blogPost'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id = '')
{
    $request->validate([
        'title' => 'required',
    ]);

    if (!empty($id)) {
        $blogPost = BlogPost::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newFilename = 'image_' . round(microtime(true)) . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("blog/", $image, $newFilename);
            $blogPost['image'] = $newFilename;
        }
        $blogPost->update($request->except('image')); // Exclude 'image' from the update
        $success = __('message.blog_post_updated_successfully');
    } else {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newFilename = 'image_' . round(microtime(true)) . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("blog/", $image, $newFilename);
            $inputs['image'] = $newFilename;
        }
        $inputs['added_by'] = Auth::user()->id;
        $blogPost = BlogPost::create($inputs);
        $success = __('message.blog_post_created_successfully');
    }

    return redirect()->route('admin.blog-posts.index')->with('success', $success);
}


public function getBlogPosts(Request $request)
{
    $columns = [
        0 => 'id',
        1 => 'title',
        2 => 'image',
        3 => 'content',
        4 => 'action',
    ];

    $limit = $request->input('length');
    $start = $request->input('start') / $limit;
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    $blogPosts = BlogPost::orderBy($order, $dir);

    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $blogPosts->where('title', 'LIKE', "%{$search}%");
    }

    $totalFiltered = $blogPosts->count();

    $blogPosts = $blogPosts->offset($start * $limit)
                           ->limit($limit)
                           ->get();

    $data = [];
    foreach ($blogPosts as $key => $blogPost) {
        $nestedData['id'] = $start * $limit + $key + 1;
        $nestedData['title'] = $blogPost->title;
        $nestedData['image'] = !empty($blogPost->image)? '<img src="' . asset("storage/blog/$blogPost->image") . '" style="width:50px;height:50px;">' : "";
        $nestedData['content'] = $blogPost->content;
        $edit = route('admin.blog-posts.edit', $blogPost->id);
        $delete = route('admin.blog-posts.delete', $blogPost->id);
        $exist = $blogPost;
        $nestedData['action'] = view('admin.layouts.partials.setting-action', compact('edit', 'delete', 'exist'))->render();
        $data[] = $nestedData;
    }

    $json_data = [
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval(BlogPost::count()),
        'recordsFiltered' => intval($totalFiltered),
        'data' => $data,
    ];

    return response()->json($json_data);
}



    public function destroy($id)
    {
        $blogPost = BlogPost::find($id);
        $blogPost->delete();
        return redirect()->route('admin.blog-posts.index')->with('success', 'BlogPost Deleted successfully');
    }
}
