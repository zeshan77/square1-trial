<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function update(Request $request)
    {
        $validated = $this->validate($request, [
            'posts_endpoint' => 'required|url',
        ]);

        auth()->user()->update([
            'posts_endpoint' => $validated['posts_endpoint'],
        ]);

        return redirect()
            ->route('profile.index')
            ->with('message', 'Profile updated');
    }
}
