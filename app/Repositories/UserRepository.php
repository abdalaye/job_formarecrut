<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{

    protected $user;

    public function __construct(User $user)
	{
		$this->user = $user;
	}

	public function store(Array $inputs):bool
	{
        $inputs['password'] = Hash::make($inputs['password']);
		$user = new $this->user($inputs);

		return $user->save();
	}

	public function getById($id):User
	{
		return $this->user->findOrFail($id);
    }

	public function update($id, Array $inputs):bool
	{
        $user = $this->getById($id);
        if(isset($inputs['password'])){
            $user->password = $inputs['password'];
            if($user->getOriginal('password') !== $inputs['password']){
                $inputs['password'] = Hash::make($inputs['password']);
            }
        }
        return $user->update($inputs);
	}

	public function destroy($id)
	{
		$this->getById($id)->delete();
	}

}
