<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = '')
    {
        $contact = '';
        if (!empty($id)) {
            $contact = ContactUs::find($id);
        }
        return view('admin.contact.create', compact('contact'));
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
        $contact = ContactUs::find($id);
       
        $contact->update($request->all()); 
        $success = __('message.contact_updated_successfully');
    } else {
        $inputs = $request->all();
       
        $contact = ContactUs::create($inputs);
        $success = __('message.contact_created_successfully');
    }

    return redirect()->route('admin.contact.index')->with('success', $success);
}


public function getContacts(Request $request)
{
    $columns = [
        0 => 'id',
        1 => 'title',
        2 => 'content',
        3 => 'action',
    ];

    $limit = $request->input('length');
    $start = $request->input('start') / $limit;
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    $contacts = ContactUs::orderBy($order, $dir);

    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $contacts->where('title', 'LIKE', "%{$search}%");
    }

    $totalFiltered = $contacts->count();

    $contacts = $contacts->offset($start * $limit)
                           ->limit($limit)
                           ->get();

    $data = [];
    foreach ($contacts as $key => $contact) {
        $nestedData['id'] = $start * $limit + $key + 1;
        $nestedData['title'] = $contact->title;
        $nestedData['content'] = $contact->content;
        $edit = route('admin.contact.edit', $contact->id);
        $delete = route('admin.contact.delete', $contact->id);
        $exist = $contact;
        $nestedData['action'] = view('admin.layouts.partials.setting-action', compact('edit', 'delete', 'exist'))->render();
        $data[] = $nestedData;
    }

    $json_data = [
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval(ContactUs::count()),
        'recordsFiltered' => intval($totalFiltered),
        'data' => $data,
    ];

    return response()->json($json_data);
}



    public function destroy($id)
    {
        $contact = ContactUs::find($id);
        $contact->delete();
        return redirect()->route('admin.contact.index')->with('success', 'Contact Deleted successfully');
    }
}
