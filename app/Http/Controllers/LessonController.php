<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Lesson;
use App\Models\Level;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    const NUM_PAGES_PAGINATION = 3;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lessons = Lesson::paginate(self::NUM_PAGES_PAGINATION);
        return inertia('Lessons/index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();
        return inertia('Lessons/create', ['categories' => $categories, 'levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Lesson::create($request->validated());
            return redirect()->route('lessons.index')->with('success', 'Create lesson satisfaction.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Create lesson crash.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        return inertia('Lessons/edit', ['lesson' => $lesson]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        try {
            $lesson->update($request->validated());
            return redirect()->route('lessons.index')->with('success', 'Update lesson satisfaction.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Update lesson crash.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        try {
            $lesson->delete();
            return redirect()->route('lessons.index')->with('success', 'Delete lesson satisfaction.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Delete lesson crash.');
        }
    }
}
