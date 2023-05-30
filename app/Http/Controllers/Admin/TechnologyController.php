<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Requests\StoreTechnologytRequest;
use App\Http\Requests\UpdateTechnologytRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $projects= Project::all();
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies', 'projects'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects= Project::all();
        $technologies = Technology::all();
        return view('admin.technologies.create', compact('technologies', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologytRequest $request)
    {
        $form_data = $request->validated();

        $form_data['slug'] = Technology::generateSlug($request->name);

        $technology = Technology::create($form_data);

        if ($request->has('projects')) {
            $technology->projects()->attach($request->projects);
        }
       
        return redirect()->route('admin.technologies.show', ['technology' => $technology->slug])->with('status', 'Tecnologia creata con successo!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologytRequest $request, Technology $technology)
    {
        $validated_data = $request->validated();
        $validated_data['slug'] = Technology::generateSlug($request->name);

        $technology->update($validated_data);
    

        return redirect()->route('admin.technologies.show', ['technology' => $technology->slug])->with('status', 'Progetto modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index');
    }
}
