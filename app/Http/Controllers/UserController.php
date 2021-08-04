<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Return all users
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Verify a user account
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function verifyUser(User $user): RedirectResponse
    {
        try
        {
            $user->update([
                'email_verified_at' => Carbon::now()
            ]);

            session()->flash('success', 'Account verified successfully');
        }
        catch(Exception $e)
        {
            Log::error($e);

            session()->flash('error', 'Error occurred. Kindly try again');
        }

        return redirect()->route('admin.users');
    }

    /**
     * Delete user account
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function deleteUser(User $user): RedirectResponse
    {
        try
        {
            $user->delete();

            session()->flash('success', 'Account verified successfully');
        }
        catch(Exception $e)
        {
            Log::error($e);

            session()->flash('error', 'Error occurred. Kindly try again');
        }

        return redirect()->route('admin.users');
    }
}
