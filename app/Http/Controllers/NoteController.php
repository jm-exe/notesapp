<?php


namespace App\Http\Controllers;


use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NoteController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Auth::user()->notes()->create([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return back();
    }

    public function edit(Note $note)
    {
        return view('edit', compact('note'));
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required'
        ]);

        $note->update([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return redirect('dashboard');
    }


    public function destroy(Note $note)
    {
        $note->delete();
        return back();
    }


    public function dashboard()
    {

       $user = Auth::user();
       if($user->isAdmin()) {
           $notes = Note::with('user')->latest()->get();
           return view('admin.dashboard', compact('notes'));
       } 

       $notes = $user->notes()->latest()->get();
       return view('dashboard', compact('notes'));
    }
}





