<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class TenantLoginController extends Controller
{
    public function login(Request $request){

        $request->validate([
            'tenant_id' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $tenant = \Stancl\Tenancy\Database\Models\Tenant::find($request->tenant_id);

        if (!$tenant) {
            return response()->json(['message' => 'Tenant not found'], 404);
        }

        // ✅ v5 için tenant başlatma
        tenancy()->initialize($tenant);

        if (!\Illuminate\Support\Facades\Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = \Illuminate\Support\Facades\Auth::user();
        $token = $user->createToken('API Token')->accessToken;

        return response()->json([
            'access_token' => $token,
            'user' => $user,
        ]);

    }

}
