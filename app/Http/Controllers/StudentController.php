<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $perPage = 10;
        $currentPage = request()->get('page', 1);
        $pagedData = new LengthAwarePaginator(
            $students->forPage($currentPage, $perPage),
            $students->count(),
            $perPage,
            $currentPage,
            ['path' => route('students.index')]
        );
        // dd($students);
        return view('students.index', compact('students', 'pagedData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phone' => 'required|string|max:20',
            'courses' => 'nullable|array',
            'courses.*' => 'exists:courses,id',
        ]);


        $student = new Student($request->all());
        // Create a new student
        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        // Attach the checked courses to the student
        $student->courses()->attach($request->courses);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('testtest'), // Set a default password / will use a hashing logic in the future
            'role_name' => json_encode(['student']),
            'created_by' => Auth::user()->id,
        ]);
        $user->student_id = $student->id;
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $user->assignRole($studentRole);
        $user->save();
        // dd($request->courses);
        foreach ($request->courses as $key => $value) {
            // $course = Course::find($value);
            // dd($course->course_end_date);
            $certificate = new Certificate();
            $certificate->student_id = $student->id;
            $certificate->course_id = $value;
            $certificate->slug = Str::random(10); // Generate a random 10-character slug
            // Check if the slug already exists in the database
            $slugCount = Certificate::where('slug', $certificate->slug)->count();
            // If the slug already exists, generate a new random slug and check again
            while ($slugCount > 0) {
                $certificate->slug = Str::random(11);
                $slugCount = Certificate::where('slug', $certificate->slug)->count();
            }
            $certificate->save();
            // dd($value);
        }
        // Redirect to the student index page
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        //  dd($student->courses());
        return view('students.edit', compact('courses', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'phone' => 'required|string|max:20',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
        ]);

        // Update the student
        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Sync the checked courses with the student
        $student->courses()->sync($request->courses);

        // Redirect to the student index page
        return redirect()->route('students.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'student deleted successfully.');
    }
}
