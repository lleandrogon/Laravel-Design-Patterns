<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Http\Requests\UserRegistrationRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\NewUserNotification;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->userService->fetchUsers();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegistrationRequest $request)
    {
        $user = $this->userService->createAndSaveUser($request->validated());

        if ($user) {
            return back()->with('success', 'User Registered Successfully!');
        }

        return back()->with('error', 'Unable to Register User. Please try again!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function registerUser(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'phoneNumber' => 'required|digits:10'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phoneNumber
        ]);

        if ($user) {
            /* 
            $response = Mail::to($user->email)->send(new WelcomeMail($user->name));
            
            Log::info('New User Registered with Name : ' . $user->name . ' and Email : ' . $user->email);

            $admins = User::where('user_type', 'admin')->get();

            Notification::send($admins, new NewUserNotification($user));
            */

            Event::dispatch(new UserRegistered($user));

            // dd($response);
        }
    }
}
