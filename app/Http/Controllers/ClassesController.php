<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classes;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    public function index()
    {
        return view('component.class.index', [
            'allClass' => Classes::with('department')
                ->withCount('students')
                ->orderBy('created_at', 'desc')
                ->paginate(7),
            'user' => auth()->user(),
            'department' => Department::select('department_name', 'id')->get(),
        ]); 
    }
  
    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'name' => 'required|max:255',
            'room_number' => 'required|numeric',
            'building' => 'required',
            'department' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->getMessageBag()->all()
            ]);
        } else {
            Classes::create([
                'name' => $request->name,
                'room_number' => $request->room_number,
                'building' => $request->building,
                'department_id' => $request->department,
                'teacher_id' => Auth()->user()->id,
            ])->save();
            return response()->json([
                'status' =>'success',
            ]);
        }
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = validator($request->all(), [
            'name' => 'required|max:255',
            'room_number' => 'required|numeric',
            'building' => 'required',
            'department' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->getMessageBag()->all()
            ]);
        } else {
            $class = Classes::find($request->id);
            if ($class) {
                $class->name = $request->name;
                $class->room_number = $request->room_number;
                $class->building = $request->building;
                $class->department_id = $request->department;
                $class->save();
            }
            return response()->json([
                'status' =>'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter(Request $request) {
        $class = Classes::withCount('students')
                        ->where('department_id', $request->filter)
                        ->orderBy('created_at', 'desc')
                        ->paginate(7);

        if ($class->count() > 0) {
            return view('component.class.filter-table', [
                'allClass' => $class,
            ]);
        }

        if ($request->filter == 'filter') {
            return response()->json(['status' => 'filter']);   
        }

        return response()->json(['status' => 'error']);   
    }

    public function search(Request $request) {
        $search = Classes::withCount('students')
            ->where('name','LIKE', '%'. $request->searchQuery. '%')
            ->paginate(7);
        
        if ($search->count() > 0) {
            return view('component.class.filter-table', [
                'allClass' => $search,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
            ]); 
        }
        
    }

    public function getStudentsForClass($classId)
    {
        $class = Classes::with('students')->findOrFail($classId);

        // All users (students)
        $allUser = User::where('role', 'student')->get();

        // Students already in this class
        $enrolledIds = $class->students->pluck('id')->toArray();

        // Students who are in ANY class (not just this one)
        $studentsWithAnyClass = DB::table('classes_details')
            ->pluck('student_id')
            ->toArray();

        return response()->json([
            'allUser' => $allUser,
            'enrolledIds' => $enrolledIds,
            'studentsWithAnyClass' => $studentsWithAnyClass,
        ]);
    }

    public function addStudentToClass(Request $request)
    {
        $validate = validator($request->all(), [
            'class_id' => 'required|exists:classes,id',
            'all_student' => 'required|array',
            'all_student.*' => 'distinct|exists:users,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->errors(),
            ], 422);
        }

        $class = Classes::find($request->class_id);

        // Get existing student IDs for this class
        $existingStudentIds = $class->students()->pluck('users.id')->toArray();
        $newStudentIds = $request->all_student;

        // Find duplicates
        $duplicateStudentIds = array_intersect($existingStudentIds, $newStudentIds);

        if (!empty($duplicateStudentIds)) {
            return response()->json([
                'status' => 'failed',
                'message' => ['One or more students are already enrolled in this class.'],
            ], 400);
        }

        // Enroll (attach) new students
        $class->students()->attach($newStudentIds);

        return response()->json([
            'status' => 'success',
            'message' => 'Students successfully enrolled.',
        ]);
    }

    public function showStudents($classId)
    {
        $class = Classes::with('students')->findOrFail($classId);

        return view('component.class.student-detail', [
            'class' => $class,
        ]);
    }

    public function removeStudent(Request $request)
    {
        $validated = $request->validate([
            'class_id' => 'required|integer|exists:classes,id',
            'student_id' => 'required|integer|exists:users,id',
        ]);

        try {
            $class = Classes::findOrFail($validated['class_id']);

            $class->students()->detach($validated['student_id']);

            return response()->json([
                'status' => 'success',
                'message' => 'Student removed successfully.',
            ]);

        } catch (\Exception $e) {
            dd($e->getMessage()); // 👈 Add this temporarily
        }

    }

    public function changeStudentClass(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:users,id',
            'current_class_id' => 'required|integer|exists:classes,id',
            'new_class_id' => 'required|integer|exists:classes,id|different:current_class_id',
        ]);

        try {
            // Detach from current class
            DB::table('classes_details')
                ->where('class_id', $validated['current_class_id'])
                ->where('student_id', $validated['student_id'])
                ->delete();

            // Attach to new class
            DB::table('classes_details')->insert([
                'class_id' => $validated['new_class_id'],
                'student_id' => $validated['student_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Student class changed successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}