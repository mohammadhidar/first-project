<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Traits\PhotoTrait;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use PhotoTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $role = Auth::user()->role;
        switch ($role) {
            case "admin":
                return redirect(route('admin.home'));
                break;
            case "doctor":
                return redirect(route('doctor.home'));
                break;
            case "nurse":
                return redirect(route('nurse.home'));
                break;
            case "user":
                return redirect(route('user.home'));
                break;
            default:
                return redirect(route('clinic.index'));
        }
    }
    public function updateProfile(Request $request, $id)
    {

        //Validation
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('home')->with(['error' => 'the user not found']);
        }

        $data = $request->only([
            'name', 'email', 'address', 'mobile',
        ]);
        if ($request->hasfile('photo')) {
            $path = 'images/users';
            $photo = $request->photo;
            $file_name = $this->savePhoto($photo, $path);
            $data['photo'] = $file_name;
        }

        if ($request->has('password')) {
            $data['password'] = bcrypt($request->password);
        }
        User::where('id', $id)->update($data);
        return redirect()->route('home')->with(['success' => 'The profile updated successfuly']);
    }
}
