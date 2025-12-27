<?php

namespace App\Http\Controllers;

use App\Models\Classname;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassnameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classname= Classname::with("subjects")->get();

        return $classname;
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
    public function show(Classname $classname)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classname $classname)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classname $classname)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classname $classname)
    {
        //
    }
}
