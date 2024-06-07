<?php

namespace App\Http\Controllers;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Requests\ProgramStoreRequest;
use App\Http\Requests\ProgramUpdateRequest;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.program.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Program $program)
    {
        return view('admin.program.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramStoreRequest $request)
    {
        Program::create($request->validated());
           
        return redirect()->route('program.index')
                         ->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramUpdateRequest $request, Program $program)
    {
        $program->update($request->validated());
          
        return redirect()->route('program.index')
                        ->with('success','Program updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
