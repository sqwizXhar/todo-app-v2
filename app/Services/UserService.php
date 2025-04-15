<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create(array $attributes) {
        $validated['password'] = Hash::make($attributes['password']);

        $user = new User();
        $user->fill($validated);
        $user->save();

        $user->createToken('authToken')->plainTextToken;

        return $user;
    }

    public function delete($id)
    {
        $user = $this->model->find($id);
        $user->tasks()->delete();

        parent::delete($id);
    }
}
