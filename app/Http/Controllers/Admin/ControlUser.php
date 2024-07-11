<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\PhotoTrait;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ControlUser extends Controller

    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        use PhotoTrait;
        public function index()
        {
            //
            $users=User::get();
            return view('admin.users.index')->with(['users'=>$users]);

        }



        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
            return view ('admin.users.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //validate




        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password'=>'required',

          ]);

            $data=$request->only('name', 'email','role');
            if($request->has('password'))
            {
                $data['password']=Hash::make($request->input('password'));
            }
            User::create($data);
            return redirect()->route('users.create')->with(['success'=>'user has added successfly']);


        }

        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
            $user=User::find($id);
            if(!$user)
                return redirect()->route('users.index')->with(['error'=>'users not found']);
            else
                return view('admin.users.create')->with(['user'=>$user]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
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
        public function update(Request $request, $id)
        {
            //
            //validate
            $data=$request->only('name', 'email','country','nationality','adress','about',
                'work_at','phone','role');

            if($request->hasFile('photo'))
            {
                $path='images\users';
                $photo=$request->photo;
                $fileName=$this->savePhoto($photo,$path);
                $data['photo']=$fileName;
            }
            $user=User::find($id);

            if($request->password==$user->password)
            {
                $data['password']=$request->password;
                //$data['password']=Hash::make($request->input('password'));
            }
            else{
                $data['password']=Hash::make($request->input('password'));
            }
            User::where('id',$id)->update($data);
            return redirect()->route('users.index')->with(['success'=>'user has updated successfly']);

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
            $user=User::find($id);
            if(!$user)
                return redirect()->route('users.index')->with(['error'=>'user not founded']);
            else
                $user->delete();
            return redirect()->route('users.index')->with(['success'=>'user deleted']);
        }

    }
