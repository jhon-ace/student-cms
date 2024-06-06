<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);

        $user = $request->user();

        if ($user->isUserType('admin')) {

            $view = 'profile/edit';
        }
        else if ($user->isUserType('instructor')) {

            $view = 'profile.edit';
        } else {

            $view = 'profile.edit';
        }

        return view($view, [
            'user' => $user,
        ]);

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $user = $request->user();

        if ($user->isUserType('admin')) {
            $redirectRoute = 'admin_profile.edit';
            $message = "Admin profile updated successfully!";
        } else if ($user->isUserType('instructor')) {
            $redirectRoute = 'instructor_profile.edit';
            $message = "Student profile updated successfully!";
        } else {
            $redirectRoute = 'instructor_profile.edit';
            $message = "Instructor profile updated successfully!";
        }

        $user->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route($redirectRoute)->with('status', $message);


    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
