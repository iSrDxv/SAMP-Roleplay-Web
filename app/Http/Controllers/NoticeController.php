<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use App\Category;
use DB;
use Carbon\Carbon;

class NoticeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $notice = DB::table('notice')
            ->join('category', 'notice.category_id', '=', 'category.id')
            ->join('users', 'notice.user_id', '=', 'user.id')
            ->where('notice.user_id', $user->id)
            ->select('notice.*', 'category.description as categorydescription','users.name as user')
            ->get();
            return view('notice.index',['notice' => $notice]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::where('status', 1)
        ->orderBy('description', 'desc')
        ->get();
        return view('notice.create',['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $notice = new Notice;
        $notice->title = $request->titulo;
        $notice->description = $request->descripcion;
        $notice->imagen = "";
        $notice->user_id = $user->id;
        $notice->category_id = $request->categoria;
        $notice->estatus = $request->estatus;
        if($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $route = '/imagenes/';
            $name = sha1(Carbon::now()).'.'.$imagen->guessExtension();
            $imagen->move(getcwd().$route, $name);
            $notice->imagen = $name;
        }
        $notice->save();
        return redirect()->route('notice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = auth()->user();
        $notice = DB::table('notice')
        ->join('category', 'notice.category_id', '=', 'category.id')
        ->join('users', 'notice.user_id', '=', 'user.id')
        ->where('notice.user_id',$user->id)
        ->where('notice.id',$id)
        ->select('notice.*', 'category.description as categorydescription','users.name as user')
        ->first();
        return view('notice.show',['notice' =>$notice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $notice = DB::table('notice')
        ->join('category', 'notice.category_id', '=', 'category.id')
        ->join('users', 'notice.user_id', '=', 'users.id')
        ->where('notice.user_id',$user->id)
        ->where('notice.id',$id)
        ->select('notice.*', 'categorias.descripcion as categorydescription','users.name as user')
        ->first();
        $categorias = Category::where('status', 1)
        ->orderBy('description', 'desc')
        ->get();
        return view('notice.edit',['notice' => $notice, 'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = auth()->user();
        $notice = Notice::find($id);
        $notice->title = $request->titulo;
        $notice->description = $request->descripcion;
        $notice->user_id = $user->id;
        $notice->category_id = $request->categoria;
        $notice->status = $request->estatus;
        if($request->file('imagen')) {
            $imagen = $request->file('imagen');
            $route = '/imagenes/';
            $name = sha1(Carbon::now()).'.'.$imagen->guessExtension();
             $imagen->move(getcwd().$route, $name);
            $notice->imagen = $name;
        }
        $notice->save();
        return redirect()->route('notice.show',['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notice = Notice::find($id);
        $notice->delete();
        return redirect()->route('notice.index');
    }
}
