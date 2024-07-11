<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use Illuminate\Http\Request;
use App\Models\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = Section::get();//select * from sections;
        return view('admin.sections.index')->with(['sections' => $sections]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        //
        $data = $request->all(); //form
        Section::create($data); //create data
        return redirect(route('sections.index'));
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

        $section = Section::find($id);//select * frpm sections 
        return view('admin.sections.create')->with(['section' => $section]);
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
        $data = $request->only(['name', 'about']);
        Section::where('id', $id)->update($data);
        return redirect(route('sections.index'));
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
        $section = Section::find($id);
        $subjects = $section->subjects;
        if ($subjects) {
            foreach ($subjects as $subject) {

                $tasks = $subject->tasks;
                if ($tasks) {
                    foreach ($tasks as $task) {
                        $task->delete();
                    }
                }
                $subject->delete();
            }
        }

        $section->delete();
        return redirect(route('sections.index'));
    }
}
