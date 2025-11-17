<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\Classes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage-users', [
            'user' => Auth::user(),
            'allUser' => User::orderBy('created_at', 'desc')->paginate(7),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserRequest $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|max:255',
            'profile' => 'required|image|max:2048',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->getMessageBag()
            ]);
        } else {

            $file = $request->file('profile')->store('public/userProfile');
            $profileName = basename($file);

            $user = new User;
            $user->name = $request->name;
            $user->img = $profileName;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = $request->role;

            $user->save();
            return response()->json([
                'status' => 'success',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show(Request $request)
    // {
    //     $user = User::find($request->id);

    //     if (!$user) {
    //         // Handle the case where the user is not found
    //         return response()->json(['error' => 'User not found'], 404);
    //     }

    //     return view('component.show-img', [
    //         'show' => $user->img,
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }
    /**
     * 
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_user(Request $request, $id)
    {
        $validator = validator($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->getMessageBag()->all()
            ]);
        } else {
            User::find($id)->update($request->all());
            
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

    public function delete(Request $request)
    {
        $user = User::find($request->id);

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found',
            ]);
        }

        if ($user->delete()) {
            return response()->json([
                'status' => 'success',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Delete failed at model layer',
        ]);
    }
    public function filter(Request $request) {
        $user = User::where('role', $request->filter)->paginate(7);
        if ($user->count() > 0) {
            return view('component.filter-table', [
                'allUser' => $user,
            ]);
        }
        if ($request->filter == 'filter'){
            return response()->json([
                'status' => 'filter'
            ]);   
        }
        return response()->json([
            'status' => 'error'
        ]);   
        
    }

    public function searchUser(Request $request) {
        $user = User::where('name', 'LIKE', $request->search. '%')->paginate(7);
        if ($user->count() > 0) {
            return view('component.filter-table', [
                'allUser' => $user,
            ]);
        } else{
            // search not found
            return response()->json([
               'status' => 'failed'
            ]);   
        }
    }

    public function studentList()
    {
        return view('component.student.index', [
            'user' => Auth::user(),
            'allUser' => User::with('classes') // eager load to avoid N+1 queries
                ->where('role', 'student')
                ->orderBy('created_at', 'desc')
                ->paginate(7),
            'allClass' => Classes::select('id', 'name')->get(),
        ]);
    }

    public function filterStudent(Request $request) {
        if ($request->filter == 'filter'){
            return response()->json([
                'status' => 'allClass'
            ]);
        }

        $student = User::with('classes')
            ->where('role', 'student')
            ->whereHas('classes', 
                function($query) use ($request) {
                    $query->where('class_id', $request->filter);
                })->paginate(7);
            if ($student->isNotEmpty() > 0) {
                return view('component.student.table-search', [
                'allStudent' => $student,
            ]);
        }

        return response()->json([
            'status' => 'error'
        ]);
    }

    public function searchStudent(Request $requeas) {
        $student = User::with('classes')
            ->where('role', 'student')
            ->where('name', 'LIKE', '%'. $requeas->search . '%')
            ->paginate(7);

        if ($student->isNotEmpty()) {
            return view('component.student.table-search', [
                'allStudent' => $student,
            ]);
        } else {
            // search not found
            return response()->json([
               'status' => 'failed'
            ]);   
        }
    }
}
