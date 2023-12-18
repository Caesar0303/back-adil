<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users() {
        $users = User::all();
        return $users;
    }

    public function edit($id) {
        $user = User::find($id);
        return $user;
    }

    public function update($id) {
        $user = User::find($id);
        $user -> update([
            'role_id' => request()->role_id
        ]);
        return 200;
    }

    public function delete($id) {
        $user = User::find($id);

        Product::where('user_id', $id)->delete();

        $user->delete();

        return response()->json(['message' => 'User deleted'], 200);
    }
}
