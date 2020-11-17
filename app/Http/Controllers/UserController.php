<?php

namespace App\Http\Controllers;

use App\Http\Repository\UserRepository;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(){
        $users = $this->userRepository->index();

        return view('users.index', compact('users'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create(){
        return view('users.create');
    }

    /**
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserCreateRequest $request)
    {
        $this->userRepository->store($request->all());

        return redirect()->route('users.index')->with('success', 'Utworzono nowego użytkownika');
    }

    /**
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * @param User $user
     * @param UserUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, UserUpdateRequest $request)
    {
        $request['admin'] = $request['admin'] ?? 0;

        $this->userRepository->update($user, $request->all());

        return redirect()->route('users.index')->with('success', 'Zaktualizowano użytkownika');
    }

    /**
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        $this->userRepository->destroy($user);

        return redirect()->route('users.index')->with('success', 'Usunięto użytkownika');
    }

    /**
     * @return Application|Factory|View
     */
    public function changePassword()
    {
        $user = Auth::user();

        return view('account.changePassword', compact('user'));
    }

    /**
     * @param ChangePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if (Auth::attempt(['email' => $user->email, 'password' => $request->get('password')])) {
            $this->userRepository->update($user, $request->all());

            return redirect()->back()->with('success', 'Hasło zostało zmienione');
        }

        return redirect()->back()->withErrors(['old_password' => 'Nieprawidłowe hasło']);
    }
}
