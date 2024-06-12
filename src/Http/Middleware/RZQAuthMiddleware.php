<?php

namespace RzqApplication\Plugin\Http\Middleware;

use Closure;
use RzqApplication\Plugin\Store\Store;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RZQAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            $store = (object) json_decode(Store::store($request->access_store), true);

            $status = $store->status ?? 0;

            if ($status == 422) {
                return response()->json($store,  $status);
            } else if ($status == 404 ||  $status == 500 ||  $status == 401) {
                return abort($status);
            }

            $user = User::where('shop_id', $request->access_store)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $store->data['name'],
                    'email' => $store->data['email'],
                    'password' => Hash::make($request->access_store),
                    'shop_id' => $request->access_store
                ]);
            }

            $guard = 'web';

            auth()->guard($guard)->login($user);
        }

        return $next($request);
    }
}
