<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\DTOs\UserDTO;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Create a new user",
     *     tags={"User"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="User created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     )
     * )
     */
    public function create(Request $request)
    {
        $userDTO = new UserDTO($request->name, $request->email, $request->password);
        $user = $this->userService->createUser($userDTO);
        return response()->json($user, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get all users",
     *     tags={"User"},
     *     @OA\Response(
     *         response=200,
     *         description="A list of users",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/User"))
     *     )
     * )
     */
    public function getAll()
    {
        $users = $this->userService->getAllUsers();
        return response()->json($users, 200);
    }

    /**
     * @OA\Get(
     *     path="/api/users/{email}",
     *     summary="Get user by email",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="email",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User details",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function getByEmail($email)
    {
        $users  = $this->userService->getUserByEmail($email);
        if ($users->isNotEmpty()) {
            return response()->json($users, 200);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    /**
     * @OA\Put(
     *     path="/api/users/{id}",
     *     summary="Update user",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="email", type="string", format="email"),
     *             @OA\Property(property="password", type="string", format="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $userDTO = new UserDTO($request->name, $request->email, $request->password);
        $user = $this->userService->updateUser($id, $userDTO);
        if ($user) {
            return response()->json($user, 200);
        }
        return response()->json(['message' => 'User not found'], 404);
    }

    /**
     * @OA\Delete(
     *     path="/api/users/{id}",
     *     summary="Delete user",
     *     tags={"User"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function delete($id)
    {
        $deleted = $this->userService->deleteUser($id);
        if ($deleted) {
            return response()->json(['message' => 'User deleted successfully'], 200);
        }
        return response()->json(['message' => 'User not found'], 404);
    }
}
