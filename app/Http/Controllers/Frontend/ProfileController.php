<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProfilePasswordUpdate;
use App\Http\Requests\Frontend\ProfileUpdateRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

    function updateProfile(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        toastr()->success('Profile Updated Successfully');

        return redirect()->back();
    }

    function updatePassword(ProfilePasswordUpdate $request): RedirectResponse
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr()->success('Password Updated Successfully!');

        return redirect()->back();
    }

    function updateAvatar(Request $request)
    {
        // return $request->avatar;

        $imagePath = $this->uploadImage($request, 'avatar');
        return $imagePath;

        // $user = Auth::user();
        // $user->avatar = $imagePath;
        // $user->save();

        // return response(['status' => 'success', 'message' => 'Avatar Updated Successfully']);
    }
}
