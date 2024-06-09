<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Requests\CourseStoreRequest;
use App\Http\Requests\CourseUpdateRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.course.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();
        return view('admin.course.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(CourseStoreRequest $request)
    {
         $course = Course::create($request->validated());
     
         $program = $course->program;
         $programName = $program ? $program->program_abbreviation : 'Not yet assigned';
     
         return redirect()->route('course.index')
                          ->with('success', 'Course - '. $course->course_code . ' as part of ' . $programName . ' program added successfully.');
    }
     

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $courses = Course::all(); // or any other relevant data source for dean statuses
        return view('admin.course.edit', compact('course', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request, $id)
    {
        $course = Course::findOrFail($id);

        if ($request->course_code !== $course->course_code || $request->course_name!== $course->course_name) 
        {
            try {
                $course->update($request->validated());
                return redirect()->route('course.index')
                    ->with('success', 'Course '. $course->course_code. ' - '.$course->course_name. ' updated successfully.');
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->errorInfo[1] === 1062) { // MySQL error code for duplicate entry
                    return redirect()->route('course.index')
                        ->with('error','Course - '. $course->course_code .' - ' .$course->course_name.'  exist!');
                } else {
                    // Handle other database exceptions
                    return redirect()->route('course.index')
                        ->with('error', 'An error occurred while updating the course.');
                }
            }
        } else {
            return redirect()->route('course.index')
                ->with('info', 'No changes were made to course ' . $course->course_code . ' - ' . $course->course_name . '.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
           
        return redirect()->route('course.index')
                        ->with('success','Course deleted successfully');
    }

    /**
     * Delete selected resources from storage.
     */
    public function deleteSelected(Request $request)
    {

        
        // Get the IDs of the selected courses
        $selectedCourses = $request->input('selected_courses');

        if ($selectedCourses) {
            // Delete the selected courses
            Course::whereIn('id', $selectedCourses)->delete();

            // Redirect with a success message
            return redirect()->route('course.index')->with('success', 'Selected courses have been deleted successfully.');
        } else {
            // Redirect with an error message if no courses were selected
            return redirect()->route('course.index')->with('error', 'No courses selected for deletion.');
        }
    }

}
