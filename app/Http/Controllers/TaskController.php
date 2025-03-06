<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    private array $validationRules = [
        'id' => 'sometimes|exists:projects,id',
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'due_date' => 'required|date|after_or_equal:today',
    ];

    /** Displays all projects
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $query = Task::query();

        if ($request->has('title')) {
            $query->where("title","like","%".  $request->get("title") ."%");
        }

        if ($request->has('description')) {
            $query->where('description','like',"%".  $request->get("description") ."%");
        }

        $tasks = $query
            ->orderBy('created_at','desc')
            ->paginate($request->get("perPage",15));;

        return view('projects.index', $tasks);
    }

    public function create() {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate($this->validationRules);

        $task = new Task();
        $task->create([
            'title' => $request->get("title"),
            'description' => $request->get("description"),
            'due_date' => $request->get("due_date"),
        ]);
    }

    public function show($id)
    {
        $task = Task::find($id);

        return view('projects.show', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('projects.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules);

        $task = Task::find($id);
        $task->update([
            'title' => $request->get("title"),
            'description' => $request->get("description"),
            'due_date' => $request->get("due_date"),
        ]);
    }

    public function destroy($id)
    {
        $proj = Task::find($id);
        $proj->delete();
    }

    /**
     * Validate listing request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function validateRequest(Request $request, array $validationRules): jsonResponse
    {
        $validatedData = Validator::make($request->all(), $validationRules);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        return response()->json();
    }
}
