<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
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
}
