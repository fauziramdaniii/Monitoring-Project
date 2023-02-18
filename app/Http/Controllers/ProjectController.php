<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        $projects = Project::join('tb_m_client', 'tb_m_project.client_id', '=', 'tb_m_client.client_id')
            ->select('tb_m_project.*', 'tb_m_client.client_name')
            ->orderBy('tb_m_project.project_id')
            ->get();
        return view('projects.index', compact('clients', 'projects'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('projects.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|max:100',
            'client_id' => 'required|exists:tb_m_client,client_id',
            'project_start' => 'required|date',
            'project_end' => 'required|date|after_or_equal:project_start',
            'project_status' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Project::create([
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'project_start' => $request->project_start,
            'project_end' => $request->project_end,
            'project_status' => $request->project_status,
        ]);

        return redirect()->route('projects.index');
    }

    public function edit(Project $project)
    {
        $clients = Client::all();
        return view('projects.edit', compact('project', 'clients'));
    }

    public function update(Request $request, Project $project)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required|max:100',
            'client_id' => 'required|exists:tb_m_client,client_id',
            'project_start' => 'required|date',
            'project_end' => 'required|date|after_or_equal:project_start',
            'project_status' => 'required|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $project->update([
            'project_name' => $request->project_name,
            'client_id' => $request->client_id,
            'project_start' => $request->project_start,
            'project_end' => $request->project_end,
            'project_status' => $request->project_status,
        ]);

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index');
    }
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
    }
}
