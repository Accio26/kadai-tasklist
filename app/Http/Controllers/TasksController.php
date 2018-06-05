<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            $data += $this->counts($user);
            return view('tasks.index', $data);
        }else {
            return view('welcome');
        }
    }

    public function create()
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    public function store(Request $request)
    {
        dump($request->all());
        $this->validate($request,[
        'content' => 'required|max:191',
        ]);
        
        // 登録方法1
        /*
        $request->user()->tasks()->create([
            'content' => $request->content,
            ]);*/
        
        // 登録方法2
        $user = \Auth::user(); 
        $task = new Task;
        $task-> user_id  = $user->id; 
        $task-> content  = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }

    public function show($id)
    {
        $task = Task::find($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function edit($id)
    {
        $task = Task::find($id);
        
        if (\Auth::user()->id === $task->users_id) {
            $tasks->delete();
        }

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
        ]);
        
        $task = Task::find($id);
        $task->content = $request->content;
        $task->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        
        if (\Auth::users()->id === $tasks->users_id) {
            $tasks->delete();
        }

        return redirect('/');
    }
}
