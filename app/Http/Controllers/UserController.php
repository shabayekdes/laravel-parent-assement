<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = collect([]);

        foreach (config('data_providers.providers') as $filePath) {
            if (\File::exists($filePath)) {
                $jsonContent = \File::json($filePath);

                $data = $data->merge($jsonContent);
            }
        }

        return response()->json($data);
    }
}
