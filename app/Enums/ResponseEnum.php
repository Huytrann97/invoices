<?php

namespace App\Enums;
use PhpParser\Node\Stmt\Enum_;
class ResponseEnum extends Enum_
{
   //------------------200 SUCCESS------------------//
   const HTTP_STATUS_SUCCESS = 200;
   const RES_STATUS_SUCCESS = 20;
   const RES_MSG_SUCCESS = 'Login successfully.';
   //------------------401 ERROR------------------//
   const HTTP_STATUS_ERR_AUTH = 401;
   const RES_STATUS_ERR_AUTH_LOGIN = 41;
   const RES_MSG_ERR_AUTH_LOGIN = 'Email or password is incorrect. Please try again.';
   const RES_STATUS_ERR_AUTH = 42;
   const RES_MSG_ERR_AUTH = 'Unauthorized request.';
   const RES_STATUS_ID_NOT_FOUND = 43;
   const RES_MSG_ID_NOT_FOUND = 'User Id is not found';
   //------------------500 ERROR------------------//
   const HTTP_STATUS_ERR_OTHER = 500;
   const RES_STATUS_ERR_DB= 51;
   const RES_MSG_ERR_DB= 'An unexpected error occurred. Please try again later.';
   const RES_STATUS_ERR_OTHER = 52;
   const RES_MSG_ERR_OTHER = 'An unexpected error occurred. Please try again later.';

}
