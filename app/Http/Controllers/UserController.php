<?php

namespace App\Http\Controllers;

use App\DataProviders\DataProviderContract;
use App\Dto\DtoUserX;
use App\Dto\DtoUserY;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    private DataProviderContract $providers;

    public function __construct(DataProviderContract $providers)
    {
        $this->providers = $providers;
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $users = $this->providers->make()
            ->getUsers()
            ->when($request->has('provider'), function ($query) use ($request) {
                return $query->where('provider', $request->get('provider'));
            })->when($request->has('statusCode'), function ($query) use ($request) {
                return $query->where('status_label', $request->get('statusCode'));
            })->when($request->has(['balanceMin', 'balanceMax']), function ($query) use ($request) {
                return $query->whereBetween('amount', $request->only(['balanceMin', 'balanceMax']));
            })
            ->values();

        return response()->json($users);
    }
}
