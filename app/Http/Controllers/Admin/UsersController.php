<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index() {
        $users = User::active()->get()->all();

        return view('admin.users.index', compact('users'));
    }

    public function inactifs() {
        $users = User::inactive()->get()->all();

        return view('admin.users.index', compact('users'));
    }

    public function show($id) {
        $user = $this->userRepository->getById($id);

        return view('admin.users.show', compact('user'));
    }

    public function update(UserUpdateRequest $request,$id)
    {
        $data = $request->validated();

        return $this->userRepository->update($id, $data) ?
                back()->withSuccess(__('actions.update.success')) :
                back()->withError(__('actions.update.fail'));
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        return $this->userRepository->store($data) ?
                redirect()->route('admin.users.index')->withSuccess(__('actions.created.success')) :
                back()->withError(__('actions.created.fail'));
    }

    public function destroy($id)
    {
        return $this->userRepository->destroy($id) ?
                redirect()->route('admin.users.index')->withSuccess(__('actions.delete.success')) :
                back()->withError(__('actions.delete.fail'));
    }
}
