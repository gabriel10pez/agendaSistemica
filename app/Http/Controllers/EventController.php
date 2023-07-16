<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('events.events-index');
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
    public function store(Event $evento)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Event $evento, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
