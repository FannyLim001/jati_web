<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserManajemenController extends Controller
{
    public function userIndex()
    {
        $user = DB::table('user_profile')
            ->rightJoin('users', 'users.id', '=', 'user_profile.user_id')
            ->select('users.id as id', 'users.username as username', 'users.email as email', 'afiliasi')
            ->where('role', '=', 'Penulis')
            ->distinct() // Add distinct() method to eliminate duplicates
            ->get();

        return view('admin.user.admin_user', ['user' => $user]);
    }

    public function tambahUser(){
        return view('admin.user.admin_tambah_user');
    }

    public function addUser(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::storeAuthor($validatedData);

        return redirect()->route('admin_manajemen_user')->with('success', 'Author Berhasil di tambahkan!');
    }

    public function detailUser(Request $request){
        $id = $request->route('id');

        $user = DB::table('users')->where('id', $id)->first();
        $user_profile = DB::table('user_profile')->where('user_id',$id)->first();

        $data = [
            'user'=>$user,
            'user_profile'=>$user_profile
        ];

        return view('admin.user.admin_detail_user', $data);
    }

    public function ubahUser(Request $request){
        $id = $request->route('id');

        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.user.admin_edit_user',['user' => $user]);
    }

    public function editUser(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create an instance of UserProfile model
        $user = new User();

        // Update the user's profile information
        $user->editAuthor($validatedData, $id);

        return redirect()->route('admin_manajemen_user')->with('success', 'Author Berhasil di edit!');
    }

    public function adminIndex()
    {
        $user = DB::table('admins')// Add distinct() method to eliminate duplicates
            ->get();

        return view('admin.admin.admin_user', ['user' => $user]);
    }

    public function tambahAdmin(){
        return view('admin.admin.admin_tambah_user');
    }

    public function addAdmin(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Admin::storeAdmin($validatedData);

        return redirect()->route('admin_manajemen_admin')->with('success', 'Admin Berhasil di tambahkan!');
    }

    public function detailAdmin(Request $request){
        $id = $request->route('id');

        $user = DB::table('admins')->where('id', $id)->first();

        $data = [
            'user'=>$user,
        ];

        return view('admin.admin.admin_detail_user', $data);
    }

    public function ubahAdmin(Request $request){
        $id = $request->route('id');

        $user = DB::table('admins')->where('id', $id)->first();
        return view('admin.admin.admin_edit_user',['user' => $user]);
    }

    public function editAdmin(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create an instance of UserProfile model
        $user = new Admin();

        // Update the user's profile information
        $user->editAdmin($validatedData, $id);

        return redirect()->route('admin_manajemen_admin')->with('success', 'Admin Berhasil di edit!');
    }

    public function editorIndex()
    {
        $user = DB::table('user_profile')
            ->rightJoin('users', 'users.id', '=', 'user_profile.user_id')
            ->select('users.id as id', 'users.username as username', 'users.email as email', 'afiliasi')
            ->where('role', '=', 'Editor')
            ->distinct() // Add distinct() method to eliminate duplicates
            ->get();

        return view('admin.editor.admin_user', ['user' => $user]);
    }

    public function tambahEditor(){
        return view('admin.editor.admin_tambah_user');
    }

    public function addEditor(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::storeEditor($validatedData);

        return redirect()->route('admin_manajemen_editor')->with('success', 'Editor Berhasil di tambahkan!');
    }

    public function detailEditor(Request $request){
        $id = $request->route('id');

        $user = DB::table('users')->where('id', $id)->first();
        $user_profile = DB::table('user_profile')->where('user_id',$id)->first();

        $data = [
            'user'=>$user,
            'user_profile'=>$user_profile
        ];

        return view('admin.editor.admin_detail_user', $data);
    }

    public function ubahEditor(Request $request){
        $id = $request->route('id');

        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.editor.admin_edit_user',['user' => $user]);
    }

    public function editEditor(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create an instance of UserProfile model
        $user = new User();

        // Update the user's profile information
        $user->editAuthor($validatedData, $id);

        return redirect()->route('admin_manajemen_editor')->with('success', 'Editor Berhasil di edit!');
    }

    public function reviewerIndex()
    {
        $user = DB::table('user_profile')
            ->rightJoin('users', 'users.id', '=', 'user_profile.user_id')
            ->select('users.id as id', 'users.username as username', 'users.email as email', 'afiliasi')
            ->where('role', '=', 'Reviewer')
            ->distinct() // Add distinct() method to eliminate duplicates
            ->get();

        return view('admin.reviewer.admin_user', ['user' => $user]);
    }

    public function tambahReviewer(){
        return view('admin.reviewer.admin_tambah_user');
    }

    public function addReviewer(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::storeReviewer($validatedData);

        return redirect()->route('admin_manajemen_reviewer')->with('success', 'Reviewer Berhasil di tambahkan!');
    }

    public function detailReviewer(Request $request){
        $id = $request->route('id');

        $user = DB::table('users')->where('id', $id)->first();
        $user_profile = DB::table('user_profile')->where('user_id',$id)->first();

        $data = [
            'user'=>$user,
            'user_profile'=>$user_profile
        ];

        return view('admin.reviewer.admin_detail_user', $data);
    }

    public function ubahReviewer(Request $request){
        $id = $request->route('id');

        $user = DB::table('users')->where('id', $id)->first();
        return view('admin.reviewer.admin_edit_user',['user' => $user]);
    }

    public function editReviewer(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        // Create an instance of UserProfile model
        $user = new User();

        // Update the user's profile information
        $user->editAuthor($validatedData, $id);

        return redirect()->route('admin_manajemen_reviewer')->with('success', 'Reviewer Berhasil di edit!');
    }
}
