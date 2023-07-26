<?php

namespace App\Dto;

class DtoUserY extends DtoUser
{
    public function __construct(array $json)
    {
        $status = $this->getStatus($json['status']);
        parent::__construct('DataProviderY', $status->value, $json['balance'], $json);
    }

    private function getStatus($status)
    {
        return match ($status){
            100 => StatusLabel::AUTHORISED,
            200 => StatusLabel::DECLINE,
            300 => StatusLabel::REFUNDED
        };
    }
}
