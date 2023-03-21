<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Community;
use App\Models\Complaint;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::all();
        return view('admin.complaint.index', compact('complaints'));
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
    public function show(Complaint $complaint)
    {
        return view('admin.complaint.show', compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        Complaint::destroy($complaint->id);
        return redirect(route('complaints.index'))->with('success', 'Complaint data has been deleted');
    }

    public function verification(Complaint $complaint)
    {
        $complaint->update([
            'status' => 'verified'
        ]);
        return redirect(route('complaints.index'))->with('success', 'Data has been verificated');
    }

    public function complaintForm()
    {
        $categories = Category::all();
        return view('community.complaintForm', compact('categories'));
    }

    public function complaintStore(Request $request)
    {
        $rules = [
            'title' => 'required',
            'category_id' => 'required',
            'date' => 'required',
            'complaint' => 'required',
            'image' => 'required|file|image|max:3024'
        ];
        $validatedData = $request->validate($rules);
        $validatedData['slug'] = Str::slug($validatedData['title'], '-');
        $validatedData['community_id'] = Auth::guard('community')->user()->id;
        $validatedData['status'] = 'new';
        $validatedData['image'] = $request->file('image')->store('public/images');
        $validatedData['image'] = substr($validatedData['image'], 7);
        Complaint::create($validatedData);
        return redirect(route('home'))->with('success')->with('success', 'Your Complaint has been added into database');
    }

    public function showAllComplaint(Community $community)
    {
        if (Auth::guard('community')->user()->id != $community->id) {
            return abort(403);
        }
        $complaints = Complaint::where('community_id', $community->id)->get();
        return view('community.showComplaint', compact('complaints', 'community'));
    }

    public function detailComplaint(Complaint $complaint)
    {
        if (Auth::guard('community')->user()->id != $complaint->community->id) {
            return abort(403);
        }
        return view('community.detailComplaint', compact('complaint'));
    }
}
