<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Faker\Provider\Base;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Parser\Tokens;

class TodoController extends Controller
{
    //controller register
    public function register()
    {
    return view('register');
    }

    //controller dashboard
    public function dashboard(){
        $todo = Todo::where('user_id', '=', auth::user()->id)->get();
        return view('dashboard',compact('todo'));
    }

    //controller home
    public function home(){
        return view('home');
    }

    //controller layout
    public function layout(){
        return view('layout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('login');
    }

    //controller logout
    public function logout(){
        auth::logout();
        return redirect('/');
    }

    public function registerAccount(Request $request)
    {
        // dd($request->all());
        $request->validate([
                'email' => 'required|email|:dns',
                'username' => 'required|min:4|max:8',
                'password' => 'required|min:4',
                'name' => 'required|min:3',
            
            ]);
        //input ke db
            User::create([
                  'name' => $request->name,
                  'username' => $request->username,
                  'email' => $request->email,
                  'password' => Hash::make($request->password), 
                ]);
            return redirect('/')-> with('success', 'Berhasil menambahkan akun! silahkan login');
    }

    public function auth(Request $request){
        $request->validate([
            'username' => 'required|exists:users,username',
            'password'=> 'required',
        ],[
             'username.exists' => 'username ini belum tersedia',
             'username.required' => 'username harus diisi',
             'password.required' => 'password harus diisi',
        ]);

        $user = $request->only('username','password');
        if(Auth::attempt($user)){
            return redirect()->route('dashboard.io');
        }else {
            return redirect()->back()->with('error', 'Gagal login, silahkan cek dan coba lagi');
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function input()
    {
        return view('input');
    }

    public function store(Request $request)
    {
        //menyimpan data ke database
        //tes koneksi blade dengan controller
        //dd($request->all());
        // validasi data
      $validated = $request->validate([
            'title' => 'required|max:8',
            'date' => 'required',
            'description' => 'required|max:15',

        ]);
        // mengirimkan data ke dalam database table todos dengan model Todo
        // '' = nama colum ditable db
        // $request -> = value attribute name pada input
        // kenapa yang dikirim 5 data? karena table pada database todo membutuhkan 6 colum input
        // salah satunya colum 'don_time' yang tipenya nullable, karna nullable jadi gak perlu dikirim nilai
        // 'user_id' untuk memberitahu data todo ini milik siapa, dimiliki melalui fitur Auth
        // 'statyus' 
        Todo::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id
        ]);
        return redirect('/dashboard')->with('success','Berhasl menambahkan data todo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan halaman input form edit 
        // Mengambil data satu baris ketika column id pada baris tersebut sama dengan id dari parameter route
        $todo = Todo::where('id', $id)->first();
        // kirim data yang diambil ke file blade dengan compact
        return view('edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:8',
            'date' => 'required',
            'description' => 'required|max:15',

        ]);
        // cari beris data yang punya id sama dengan data id yang dikirim ke parameter route
        //kalau udah ketemu, update column-column diatasnya
        Todo::where('id', $id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'status' => 0,
            'user_id' => Auth::user()->id
        ]);
        // kalau berhasil, halaman bakal di redirect ulang ke halaman awal todo dengan pesan pemberitahuan
        return redirect('dashboard')->with('successUpdate','Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
      Todo::find($id)->delete();
      return redirect('/dashboard')->with('success','Berhasil di hapus');
    }

    public function complated(){
        $todo = Todo::where('user_id', Auth::user()->id)->get();
        return view('complated',compact('todo'));
    }

    public function updateComplated($id){
        Todo::where('id','=',$id)->update([
            'status' => 1,
            'done_time' => \Carbon\Carbon::now(),
        ]);

        return redirect()->back()->with('done','Todo telah selesai dikerjakan');
    }
}
