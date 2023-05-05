<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function list(Request $request)
    {
        $users = User::whereRaw(true);
        $this->response = $this->listData($request, $users);
        return response()->json($this->response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request) : RedirectResponse
    {
        try {
            $validate = $request->validate([
                'name'     => 'required|string',
                'email'    => 'required|email|unique:users,email',
                'password' => 'required',
                'address'  => 'required|string',
                'phone'    => 'required',
                'type'     => 'required',
                'account_number'  => 'numeric',
                'profile_picture' => 'required|image',
            ]);
            $product = User::create($validate);
            $product->images()->create([
                'url' => $request->file('profile_picture')->store('images', 'public'),
                'type' => 1,
            ]);
            $this->response_type = 'success';
            $this->message = 'Se ha creado el usuario';
        } catch (Exception $exception) {
            $this->message = $exception->getMessage();
        }
        return redirect()->back()->with($this->response_type, $this->message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('images')->find($id);
        return response()->json($user);
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
        try {
            $user = User::find($id);
            if ($user) {
                $user->delete();
                $this->message = 'Usuario eliminado';
            } else {
                $this->message = 'El usuario no existe';
            }
            $this->status_code = 200;

        } catch (Exception) {
            $this->message = 'El usuario no se puede eliminar';
        } finally {
            $response = [
                'message' => $this->message
            ];
        }
        return response()->json($response, $this->status_code);
    }
}
