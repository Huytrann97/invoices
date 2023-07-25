<?php
namespace App\Exceptions;

use App\Enums\ResponseEnum;
class UserNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct(ResponseEnum::RES_MSwG_ID_NOT_FOUND, ResponseEnum::RES_STATUS_ID_NOT_FOUND);
    }
}
