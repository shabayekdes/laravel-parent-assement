<?php

namespace App\Dto;

class DtoUserX extends DtoUser
{
    public function __construct(array $json)
    {
        $status = $this->getStatus($json['statusCode']);
        parent::__construct('DataProviderX', $status->value, $json['parentAmount'], $json);
    }

    private function getStatus($status)
    {
        return match ($status){
            1 => StatusLabel::AUTHORISED,
            2 => StatusLabel::DECLINE,
            3 => StatusLabel::REFUNDED
        };
    }
}
