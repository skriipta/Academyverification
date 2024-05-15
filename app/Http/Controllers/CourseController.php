<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $pagedData = new LengthAwarePaginator(
            $courses->forPage($currentPage, $perPage),
            $courses->count(),
            $perPage,
            $currentPage,
            ['path' => route('courses.index')]
        );
        // dd($courses);
        return view('courses.index', compact('courses', 'pagedData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_start_date' => 'required|date',
            'course_end_date' => 'required|date',
            'crt_title' => 'nullable|string|max:255',
            'crt_header' => 'nullable|string|max:255',
            'crt_footer' => 'nullable|string|max:255',
        ]);

        // Create a new course
        Course::create([
            'course_name' => $request->course_name,
            'course_start_date' => $request->course_start_date,
            'course_end_date' => $request->course_end_date,
            'crt_title' => $request->crt_title,
            'crt_header' => $request->crt_header,
            'crt_footer' => $request->crt_footer,
        ]);

        // Redirect to the course index page
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $courses = Course::all();
        //  dd($course->courses());
        return view('courses.edit', compact('courses', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_start_date' => 'required|date',
            'course_end_date' => 'required|date',
            'crt_title' => 'nullable|string|max:255',
            'crt_header' => 'nullable|string|max:255',
            'crt_footer' => 'nullable|string|max:255',
        ]);

        // Update the course
        $course->update([
            'course_name' => $request->course_name,
            'course_start_date' => $request->course_start_date,
            'course_end_date' => $request->course_end_date,
            'crt_title' => $request->crt_title,
            'crt_header' => $request->crt_header,
            'crt_footer' => $request->crt_footer,
        ]);

        // Sync the checked courses with the course

        // Redirect to the course index page
        return redirect()->route('courses.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'course deleted successfully.');
    }
}
