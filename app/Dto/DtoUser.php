<?php

namespace App\Dto;

use Illuminate\Contracts\Support\Arrayable;

class DtoUser implements Arrayable
{
    public function __construct(
        public string $provider,
        public string $status,
        public int $amount,
        public array $json
    ){}

    public function toArray(): array
    {
        $this->json['provider'] = $this->provider;
        $this->json['status_label'] = $this->status;
        $this->json['amount'] = $this->amount;
        return $this->json;
    }
}
