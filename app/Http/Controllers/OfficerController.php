<?php

namespace App\Http\Controllers;

use App\Models\Officer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OfficerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Search by Name
        $officers = Officer::when($request->search, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->search}%");
        })->orderBy('created_at', 'desc')->paginate(5);

        $officers->appends($request->only('search'));

        return view('admin.officer.index', compact('officers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.officer.create');
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
            'telp' => 'required',
            'level' => 'required'
        ];
        $validatedData = $request->validate($rules);

        // Slug and Hash Password
        $validatedData['slug'] = Str::slug($validatedData['username'], '-');
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Save to database
        Officer::create($validatedData);

        return redirect(route('officers.index'))->with('success', 'New Officer / Admin has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Officer $officer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Officer $officer)
    {
        return view('admin.officer.edit', compact('officer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Officer $officer)
    {
        $rules = [
            'nik' => 'required|min:16|max:16',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'level' => 'required'
        ];
        if ($request['nik'] != $officer['nik']) {
            $rules['nik'] = 'required|unique:communities';
        }
        if ($request['username'] != $officer['username']) {
            $rules['username'] = 'required|unique:communities';
        }
        if ($request['email'] != $officer['email']) {
            $rules['email'] = 'required|unique:communities';
        }
        $validatedData = $request->validate($rules);
        Officer::where('id', $officer->id)->update($validatedData);
        return redirect(route('officers.index'))->with('success', 'Officer data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Officer $officer)
    {
        Officer::destroy($officer->id);
        return redirect(route('officers.index'))->with('success', 'Officer has been deleted');
    }
}
