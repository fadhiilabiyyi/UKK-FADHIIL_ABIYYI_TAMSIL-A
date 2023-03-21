<?php

namespace App\Http\Controllers;

use App\Models\Response;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Complaint $complaint)
    {
        return view('admin.response.create', compact('complaint'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'complaint_id' => 'required',
            'officer_id' => 'required',
            'response' => 'required'
        ];
        $validatedData = $request->validate($rules);
        Response::create($validatedData);
        Complaint::where('id', $validatedData['complaint_id'])->update(['status' => 'finished']);
        return redirect(route('complaints.index'))->with('success', 'Complaint has been given response');
    }

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        //
    }
}
