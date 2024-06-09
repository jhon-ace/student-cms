<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        $program = Program::create($request->validated());
           
        return redirect()->route('program.index')
                         ->with('success',  $program->program_abbreviation . ' Program created successfully.');
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

        if ($program->wasChanged()) {
            return redirect()->route('program.index')
                            ->with('success', $program->program_name . ' Program updated successfully.');
        } else {
            return redirect()->route('program.index')
                            ->with('info', 'No changes were made to the ' . $program->program_abbreviation . ' Program.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
