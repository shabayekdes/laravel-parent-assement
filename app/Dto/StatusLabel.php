<?php

namespace App\Dto;

enum StatusLabel: string
{
    case AUTHORISED = 'authorised';
    case DECLINE = 'decline';
    case REFUNDED = 'refunded';
}
