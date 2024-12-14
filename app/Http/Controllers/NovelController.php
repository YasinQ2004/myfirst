<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Chapter;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('book.index', compact('books'));
    }
    /**
     * Display a listing of the resource.
     */
    public function chapers()
    {
          // Get all chapters and eager load their related books
    $chapters = Chapter::with('book')->get();

    // Return the view and pass the chapters with books
    return view('chapters.index', compact('chapters'));
    }

    public function ListBooks()
    {
        $books = Book::all();
        return view('book.list', compact('books'));
    }

  

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'required|mimes:jpg, jpeg,png,pdf,docs,doc|max:2048',
        ]);

        $book = new Book();
        $book->name = $request->name;
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $image = $request->file('photo');
            $fileName = $image->getClientOriginalName(); // Get the original name of the uploaded file
            // Proceed with saving or processing the file
            $filePath = $request->file('photo')->storeAs('books', $fileName, 'public');
        } else {
            // Handle file not uploaded or invalid file
            return redirect()->back()->with('error', 'No valid file uploaded.');
        }

        $book->photo = $fileName;
        $book->save();
        return redirect()->route('book.index')->with('success', 'Data inserted successfully');
    }


    // Store a new chapter for the book
    public function storeChapter(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $book = Book::findOrFail($id);

        // Create a new chapter and associate it with the book
        $book->chapters()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('book.chapters', $id)->with('success', 'Chapter added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function details(string $id)
    {
        $book = Book::find($id);
        return view('book.details', compact('book'));
    }


    /**
     * Display the specified resource.
     */
    public function addChapter(int $id)
    {
        $book = Book::findOrFail($id);
        return view('book.create-chapter', compact('book'));
    }

    // In ChapterController.php
    public function show($id)
    {
        // Retrieve the chapter along with its book (if necessary)
        $chapter = Chapter::with('book')->findOrFail($id);

        // Return the view with the chapter data
        return view('book.showchap', compact('chapter'));
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

}
