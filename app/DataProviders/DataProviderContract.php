<?php

namespace App\DataProviders;

interface DataProviderContract
{
    public function make();
    public function getUsers();
}
