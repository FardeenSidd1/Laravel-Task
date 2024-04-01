<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
  /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view('admin.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = '')
    {
        $about = '';
        if (!empty($id)) {
            $about = AboutUs::find($id);
        }
        return view('admin.about.create', compact('about'));
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
        $about = AboutUs::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newFilename = 'image_' . round(microtime(true)) . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("about/", $image, $newFilename);
            $about['image'] = $newFilename;
        }
        $about->update($request->except('image')); // Exclude 'image' from the update
        $success = __('message.about_updated_successfully');
    } else {
        $inputs = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newFilename = 'image_' . round(microtime(true)) . '.' . $image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs("about/", $image, $newFilename);
            $inputs['image'] = $newFilename;
        }
        $about = AboutUs::create($inputs);
        $success = __('message.about_created_successfully');
    }

    return redirect()->route('admin.about.index')->with('success', $success);
}


public function getAboutUs(Request $request)
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

    $abouts = AboutUs::orderBy($order, $dir);

    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $abouts->where('title', 'LIKE', "%{$search}%");
    }

    $totalFiltered = $abouts->count();

    $abouts = $abouts->offset($start * $limit)
                           ->limit($limit)
                           ->get();

    $data = [];
    foreach ($abouts as $key => $about) {
        $nestedData['id'] = $start * $limit + $key + 1;
        $nestedData['title'] = $about->title;
        $nestedData['image'] = !empty($about->image)? '<img src="' . asset("storage/about/$about->image") . '" style="width:50px;height:50px;">' : "";
        $nestedData['content'] = $about->content;
        $edit = route('admin.about.edit', $about->id);
        $delete = route('admin.about.delete', $about->id);
        $exist = $about;
        $nestedData['action'] = view('admin.layouts.partials.setting-action', compact('edit', 'delete', 'exist'))->render();
        $data[] = $nestedData;
    }

    $json_data = [
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval(AboutUs::count()),
        'recordsFiltered' => intval($totalFiltered),
        'data' => $data,
    ];

    return response()->json($json_data);
}



    public function destroy($id)
    {
        $about = AboutUs::find($id);
        $about->delete();
        return redirect()->route('admin.about.index')->with('success', 'About Deleted successfully');
    }
}
