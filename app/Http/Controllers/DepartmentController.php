<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.department.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Department $department)
    {
        return view('admin.department.create', compact('department'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentStoreRequest $request)
    {
        $department = Department::create($request->validated());
           
        return redirect()->route('department.index')
                         ->with('success', $department->department_name . ' Department created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('admin.department.edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, Department $department)
    {

        $department->update($request->validated());

        if ($department->wasChanged()) {
            return redirect()->route('department.index')
                            ->with('success', $department->department_name . ' Department updated successfully.');
        } else {
            return redirect()->route('department.index')
                            ->with('info', 'No changes were made to the ' . $department->department_name . ' Department.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
    }
}
