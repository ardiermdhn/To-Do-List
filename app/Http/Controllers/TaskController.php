<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Console\View\Components\Task as ComponentsTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $Tasks = Task::where('Task', 'like','%'.$search.'%')
                ->orWhere('Prioritas', 'like','%'.$search.'%')
                ->orWhere('status', 'like','%'.$search.'%')
                ->orderByRaw("FIELD(status,'pending','completed') ASC")
                ->orderBy('created_at', 'desc')
                ->get();


        return view('List.index', compact('Tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Task' => 'required|string|max:255',
            'Prioritas' => 'required',
            'Tanggal' => 'required',
        ]);

        Task::create([
            'Task' => $request->Task,
            'status' => 'pending',
            'Prioritas' => $request->Prioritas,
            'Tanggal' => $request->Tanggal,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(task $task) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $Task)
    {
        $request->validate([
            'Task' => 'required|string|max:255',
            'Prioritas' => 'required',
            'Tanggal' => 'required',
        ]);

        $Task->update([
            'Task' => $request->Task,
            'status' => 'pending',
            'Prioritas' => $request->Prioritas,
            'Tanggal' => $request->Tanggal,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil diperbarui!');
    }

    /**back
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }
    public function status(Request $request,$id){
        $task = Task::findOrFail($id);
        $task->status = $request->has('status') ? 'completed' : 'pending';
        $task->save();

        return redirect()->back()->with('success', 'Status tugas berhasil diperbarui!');
    }
}
