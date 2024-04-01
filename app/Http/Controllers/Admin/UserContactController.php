<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserContact;
use Illuminate\Http\Request;

class UserContactController extends Controller
{/**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view('admin.user-contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('frontend.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
           
        UserContact::create($request->all());
        $success = __('message.user_contact_created_successfully');
    

    return redirect()->route('frontend.contactus')->with('success', $success);
    }


public function getUserContacts(Request $request)
{
    $columns = [
        0 => 'id',
        1 => 'name',
        2 => 'email',
        3 => 'message',
        4 => 'action',
    ];

    $limit = $request->input('length');
    $start = $request->input('start') / $limit;
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    $userContacts = UserContact::orderBy($order, $dir);

    if (!empty($request->input('search.value'))) {
        $search = $request->input('search.value');
        $userContacts->where('name', 'LIKE', "%{$search}%");
    }

    $totalFiltered = $userContacts->count();

    $userContacts = $userContacts->offset($start * $limit)
                           ->limit($limit)
                           ->get();

    $data = [];
    foreach ($userContacts as $key => $userContact) {
        $nestedData['id'] = $start * $limit + $key + 1;
        $nestedData['name'] = $userContact->name;
        $nestedData['email'] = $userContact->email;
        $nestedData['message'] = $userContact->message;
        $data[] = $nestedData;
    }

    $json_data = [
        'draw' => intval($request->input('draw')),
        'recordsTotal' => intval(UserContact::count()),
        'recordsFiltered' => intval($totalFiltered),
        'data' => $data,
    ];

    return response()->json($json_data);
}



  
}
