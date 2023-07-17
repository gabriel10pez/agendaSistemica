<?php

namespace App\Http\Controllers;

use App\Models\Memorandum;
use Illuminate\Http\Request;

class MemorandumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('memoranda.memoindex');
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
    public function show(Memorandum $memorandum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Memorandum $memorandum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Memorandum $memorandum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Memorandum $memorandum)
    {
        //
    }
}
