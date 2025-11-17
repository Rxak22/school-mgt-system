<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view('component.department.index',[
            'allDepartment' => Department::join('users', 'departments.added_by', '=', 'users.id')
                ->select('departments.*', 'users.name as added_by')
                ->paginate(9),
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $validate = validator($request->all(), [
            'department_name' => 'required|max:255|unique:departments,department_name',
            'department_code' => 'required|max:25|unique:departments,department_code',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->getMessageBag(),
            ]);
        }

        $dep = new Department;
        $dep->department_name = $request->department_name;
        $dep->department_code = $request->department_code;
        $dep->added_by = auth()->user()->id;
        $dep->save();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function destroy(Request $request){
        $dep = Department::find($request->id)->delete();
        if($dep){
            return response()->json([
             'status' =>'success',
            ]);
        }
        return response()->json([
            'status' =>'failed',
           ]);
    }

    public function update(Request $request)
    {
        $validate = validator($request->all(), [
            'department_name' => 'required|max:255|unique:departments,department_name,' . $request->id,
            'department_code' => 'required|max:25|unique:departments,department_code,' . $request->id,
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validate->getMessageBag(),
            ]);
        }

        // Find department by ID
        $dep = Department::find($request->id);
        if (!$dep) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Department not found',
            ]);
        }

        // Update department fields
        $dep->department_name = $request->department_name;
        $dep->department_code = $request->department_code;
        $dep->save();

        return response()->json([
            'status' => 'success',
        ]);
    }
    public function search(Request $request)
    {
        $departments = Department::where('department_name', 'LIKE', '%' . $request->input('query') . '%')
            ->orWhere('department_code', 'LIKE', '%' . $request->input('query') . '%')
            ->paginate(9);

        if ($departments->isEmpty()) {
            return response()->json([
                'status' => 'failed',
            ]);
        }

        return view('component.department.search-table', [
            'allDepartment' => $departments,
        ])->render(); // render to return HTML as string
    }
}
