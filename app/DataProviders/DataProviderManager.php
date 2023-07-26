<?php

namespace App\DataProviders;

use Illuminate\Support\Facades\File;

class DataProviderManager implements DataProviderContract
{
    private $users;
    private array $providers;

    public function __construct($providers)
    {
        $this->providers = $providers;
        $this->users = collect([]);
    }

    public function make()
    {
        foreach ($this->providers as $provider => $filePath) {
            if (File::exists($filePath)) {
                $jsonContents = File::json($filePath);
                foreach ($jsonContents as $content) {
                    $user = new $provider($content);
                    $this->users->push($user->toArray());
                }
            }
        }
        return $this;
    }
    public function getUsers()
    {
        return $this->users;
    }
}
