<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('component.course.index',[
            'allCourse' => Course::join('departments as d', 'courses.department_id', '=', 'd.id')
                            ->select('courses.*', 'd.department_name')
                            ->paginate(7),
            'user' => Auth()->user(),
            'department' => Department::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'course_name' => 'required|max:255|unique:courses',
            'for_year' => 'required|max:255',
            'department_code' => 'required|exists:departments,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->getMessageBag()
            ]);
        } else {
            $course = new Course();
            $course->course_name = $request->course_name;
            $course->for_year = $request->for_year;
            $course->department_id = $request->department_code;
            $course->added_by = Auth()->user()->id;
            $course->save();

            return response()->json([
                'status' => 'success',
            ]);
        }
    }

    public function search(Request $request) {
    
        $searchResults = Course::where('course_name', 'LIKE', '%'. $request->search . '%')
            ->paginate(7);
    
        if ($searchResults->count() > 0) {
            return view('component.course.search-table', [
                'allcourse' => $searchResults,
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
            ]);
        }
    }
    
    public function update(Request $request)
    {
        $validate = validator($request->all(), [
            'course_name' => 'required|max:255',
            'for_year' => 'required|integer|min:1|max:4',
            'department_code' => 'required|exists:departments,id',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->getMessageBag(),
            ]);
        }

        $course = Course::find($request->id);
        if (!$course) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Course not found',
            ]);
        }

        $course->update([
            'course_name' => $request->course_name,
            'for_year' => $request->for_year,
            'department_id' => $request->department_code,
        ]);

        return response()->json(['status' => 'success']);
    }

    public function destroy(Request $request)
    {
        $delete = Course::find($request->id)->delete();

        if ($delete) {
            return response()->json([
              'status' =>'success',
            ]);
        } else {
            return response()->json([
             'status' => 'failed',
            ]);
        }
    }
}
