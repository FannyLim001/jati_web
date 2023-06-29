<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index()
    {
        $id = Auth::guard('user')->user()->id;

        $profile = DB::table('user_profile')
            ->where('user_id', $id)
            ->first();

        return view('user.profil.user_profile', ['profile' => $profile]);
    }

    public function isiProfile()
    {
        return view('user.profil.isi_profile');
    }

    public function storeProfile(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        UserProfile::storeProfile($validatedData);

        return redirect()->route('profile')->with('success', 'Profil Berhasil di isi!');
    }

    public function ubahProfile()
    {
        $id = Auth::guard('user')->user()->id;

        $profile = DB::table('user_profile')
            ->where('user_id', $id)
            ->first();

        return view('user.profil.edit_profile', ['profile' => $profile]);
    }

    public function editProfile(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        // Create an instance of UserProfile model
        $userProfile = new UserProfile();

        // Update the user's profile information
        $userProfile->editProfile($validatedData);

        return redirect()->route('profile')->with('success', 'Profil Berhasil di isi!');
    }

    public function adminIsiProfile(Request $request)
    {
        $id = $request->route('id');

        return view('admin.profile.admin_isi_profile_user',['id'=>$id]);
    }

    public function adminStoreProfile(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        UserProfile::adminStoreProfile($validatedData,$id);

        return redirect()->route('admin_manajemen_user')->with('success', 'Profil Berhasil di isi!');
    }

    public function adminUbahProfile(Request $request)
    {
        $id = $request->route('id');

        $profile = DB::table('user_profile')
            ->where('id', $id)
            ->first();

        return view('admin.profile.admin_edit_profile_user', ['profile' => $profile,'id'=>$id]);
    }

    public function adminEditProfile(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        // Create an instance of UserProfile model
        $userProfile = new UserProfile();

        // Update the user's profile information
        $userProfile->adminEditProfile($validatedData,$id);

        return redirect()->route('admin_manajemen_user')->with('success', 'Profil Berhasil di isi!');
    }

    public function adminIsiProfileEditor(Request $request)
    {
        $id = $request->route('id');

        return view('admin.profile.admin_isi_profile_user',['id'=>$id]);
    }

    public function adminStoreProfileEditor(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        UserProfile::adminStoreProfile($validatedData,$id);

        return redirect()->route('admin_manajemen_editor')->with('success', 'Profil Berhasil di isi!');
    }

    public function adminUbahProfileEditor(Request $request)
    {
        $id = $request->route('id');

        $profile = DB::table('user_profile')
            ->where('id', $id)
            ->first();

        return view('admin.profile.admin_edit_profile_user', ['profile' => $profile,'id'=>$id]);
    }

    public function adminEditProfileEditor(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        // Create an instance of UserProfile model
        $userProfile = new UserProfile();

        // Update the user's profile information
        $userProfile->adminEditProfile($validatedData,$id);

        return redirect()->route('admin_manajemen_editor')->with('success', 'Profil Berhasil di isi!');
    }

    public function adminIsiProfileReviewer(Request $request)
    {
        $id = $request->route('id');

        return view('admin.profile.admin_isi_profile_user',['id'=>$id]);
    }

    public function adminStoreProfileReviewer(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        UserProfile::adminStoreProfile($validatedData,$id);

        return redirect()->route('admin_manajemen_reviewer')->with('success', 'Profil Berhasil di isi!');
    }

    public function adminUbahProfileReviewer(Request $request)
    {
        $id = $request->route('id');

        $profile = DB::table('user_profile')
            ->where('id', $id)
            ->first();

        return view('admin.profile.admin_edit_profile_user', ['profile' => $profile,'id'=>$id]);
    }

    public function adminEditProfileReviewer(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate([
            'nama' => 'required',
            'no_telp' => 'required',
            'afiliasi' => 'required',
            'bahasa_kerja' => 'required',
            'gsch_id' => 'required',
            'scopus_id' => 'required',
            'sinta_id' => 'required',
        ]);

        // Create an instance of UserProfile model
        $userProfile = new UserProfile();

        // Update the user's profile information
        $userProfile->adminEditProfile($validatedData,$id);

        return redirect()->route('admin_manajemen_reviewer')->with('success', 'Profil Berhasil di isi!');
    }
}
