<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Book;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth',['except'=> ['index','show','booking']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$book = Book::all();
        //$book = DB::select('SELECT * FROM books');
       // $books = Book::orderBy('title','desc')->take(1)->get();
       // $books = Book::orderBy('title','desc')->get();
       $books = Book::orderBy('created_at','desc')->paginate(10);
        return view('books.index')->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $books = DB::table('books')->where('title', 'like', '%' .$search. '%')->get();
        return view('index',['books'=> $books]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->body = $request->input('body');
        $book->user_id = auth()->user()->id;
        $book->cover_image = $fileNameToStore;
        $book->save();

        return redirect('/books')->with('success','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('books.show')->with('book',$book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);

        if(auth()->user()->id !==$book->user_id){
            return redirect('/books')->with('error','Unauthorised Page');
        }
        return view('books.edit')->with('book',$book);
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
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $book->cover_image = $fileNameToStore;
        }
        $book->save();

        return redirect('/books')->with('success','Book Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        
        //Check if post exists before deleting
        if (!isset($book)){
            return redirect('/books')->with('error', 'No Post Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$book->user_id){
            return redirect('/books')->with('error', 'Unauthorized Page');
        }

        if($book->cover_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$book->cover_image);
        }
        
        $book->delete();
        return redirect('/books')->with('success','Book Removed');
    }

    public function booking($id)
    {
        $book = Book::find($id);

        if(auth()->user()->id !==$book->user_id){
            return redirect('/books')->with('error','Unauthorised Page');
        }
        return view('books.booking')->with('book',$book);
    }
}
