<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;
use DB;
use Session;
use Redirect;
use Data;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = User::orderBy('id','desc')->get();
        return view('home',compact('data'));
    }

    public function postupdate(Request $request)
    {
        //$update = User::where('id',$request->id);
        $id = $request->id;
        $user = User::findOrFail($id);
        $user->status = $request->status;
        $user->update();

        return redirect('home');
    }

   /*  public function hapus($id)
    {
      $data = Data::where('id',$id)->delete();
      return redirect('home');
    } */

        public function hapus($id)
        {
            DB::table('users')->where('id', '=', $id)->delete();
              Session::flash('message', 'Data Berhasil Dihapus');
              return Redirect::to('home');
        }

         public function ubah(Request $request)
            {
                $ubah = User::where('id', $request->id)->first();
                $ubah->name = $request->name;
                $ubah->email = $request->email;


                $ubah->update();
                return redirect('home');
            }
}
