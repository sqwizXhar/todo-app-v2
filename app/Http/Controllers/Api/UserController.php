<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Modules\User\Http\Resources\UserCollection;
use App\Modules\User\Models\User;
use App\Modules\User\Services\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(UpdateUserRequest $request)
    {
        $result = $this->userService->create($request->validated());

        return new UserCollection($result);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $result = $this->userService->update($user, $request->validated());

        return new UserCollection($result);
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return response()->json();
    }
}
