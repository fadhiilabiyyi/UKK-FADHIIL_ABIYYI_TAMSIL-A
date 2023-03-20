<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CommunityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search by Name
        $communities = Community::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%");
        })->orderBy('created_at', 'desc')->paginate(5);

        $communities->appends($request->only('search'));

        return view('admin.community.index', compact('communities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.community.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required|min:16|max:16|unique:communities',
            'name' => 'required',
            'username' => 'required|unique:communities',
            'password' => 'required',
            'email' => 'required|unique:communities',
            'telp' => 'required'
        ];
        $validatedData = $request->validate($rules);

        // Slug and Hash Password
        $validatedData['slug'] = Str::slug($validatedData['username'], '-');
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Save to database
        Community::create($validatedData);

        return redirect(route('communities.index'))->with('success', 'New User has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Community $community)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Community $community)
    {
        return view('admin.community.edit', compact('community'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Community $community)
    {
        $rules = [
            'nik' => 'required|min:16|max:16',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'telp' => 'required'
        ];
        if ($request['nik'] != $community['nik']) {
            $rules['nik'] = 'required|unique:communities';
        }
        if ($request['username'] != $community['username']) {
            $rules['username'] = 'required|unique:communities';
        }
        if ($request['email'] != $community['email']) {
            $rules['email'] = 'required|unique:communities';
        }
        $validatedData = $request->validate($rules);
        Community::where('id', $community->id)->update($validatedData);
        return redirect(route('communities.index'))->with('success', 'User data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Community $community)
    {
        Community::destroy($community->id);
        return redirect(route('communities.index'))->with('success', 'User has been deleted');
    }
}
