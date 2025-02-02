<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginproses(Request $request ){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $remember_me = $request->has('remember_me') ? true : false; 

        if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],$remember_me)){
            return redirect('/');
        }else{
            return  redirect('/login')->with('failed','Username atau Password salah');;
        }   
    }
    public function register(){
        return view('register');
    }
    public function registeruser(Request $request ){
        $this->validate($request,[
            'name'       => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:20',                       
            'email'      => 'required|email|unique:users',     
            'password'   => 'required|min:5|max:20',
        ]);
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'remember_token'=> Str::random(60),
        ]);
        if(session('halaman_url2')){
            return redirect(session('halaman_url2'))->with('success','Data user telah ditambah');
        }else{
            return redirect()->route('detailuser')->with('failed','Data user gagal ditambah');
        }
    }
    public function logout(Request $request ){
        Auth::logout();
        return  redirect('/login');
    }
    // profil
    public function profil(Request $request){
        $data = [
            // 'title' => 'Data Produk',
            'edit' => User::findOrFail(auth()->user()->id),
            'request' => $request
        ];
        return view('profil', $data);
    }

    // data proses profil
    public function updateprofil(Request $request){
        $validator = \Validator::make($request->all(),[
            'name'       => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:20',                       
            'email'      => 'required|email|unique:users',     
            'password'   => 'required|min:5|max:20',
            "password_confirmation" => "required|min:6",
        ]);

        if($validator->passes())
        {
            if($request->get("password") == $request->get("password_confirmation"))
            {
                User::findOrFail(auth()->user()->id)->update([
                    'name'          => $request->get("name"),
                    'email'         => $request->get("email"),
                    'password'      => bcrypt($request->get("password")),
                    'updated_at'    => date('Y-m-d H:i:s'),
                ]);
                return redirect()->back()->with("success"," Berhasil Update Data ! ");
            }
            else{
                return redirect()->back()->with("failed","Confirm Password Tidak Sama !");
            }
        }
        else{
            return redirect()->back()->withErrors($validator)->with("failed"," Gagal Update Data ! ");
        }
    }

    // data proses profil
    public function datauser(Request $request)
    {
        if($request->has('search')){    
            $data = User::where('name','LIKE','%' .$request->search.'%')
            ->orWhere('email','LIKE','%' .$request->search.'%')
            ->orWhere('role','LIKE','%' .$request->search.'%')
            ->paginate(10);
            Session::put('halaman_url2',request()->fullurl());
        }else{
            $data = User::paginate(10);
            // $data = User::latest()->paginate(5); 
            Session::put('halaman_url2',request()->fullurl());
        }
        return view('datauser', compact('data'));
    }

    // public function ubahrole(Request $request, $id){
    //     $data = User::find($id);
    //     $data->update($request->all());

    //     if(session('halaman_url2')){
    //         return redirect(session('halaman_url2'))->with('success','Role user telah dirubah');
    //     }else{
    //         return redirect()->route('detailuser')->with('failed','Role user gagal dirubah');
    //     }

    // }

    public function deletedatauser($id){
        $data = User::find($id);
        $data->delete();

        if(session('halaman_url2')){
            return redirect(session('halaman_url2'))->with('success','Data Berhasil didelete');
        }else{
            return redirect()->route('datauser')->with('failed','Data tidak Berhasil ddelete');
        }
    }
}
