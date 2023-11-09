<?php

namespace App\Helpers;

class EnumsHelper
{
    public static function StatusApiName()
    {
        return new class {
            const SUCCESS = 'Success';
            const NOTFOUND = 'NOT FOUND';
            const FAILED = 'FAILED';
        };
    }
    public static function StatusApi()
    {
        return new class {
            const OK = 'ok';
            const CREATED = 'created';
            const NO_CONTENT = 'no_content';
            const BAD_REQUEST = 'bad_request';
            const UNAUTHORIZED = 'unauthorized';
            const FORBIDDEN = 'forbidden';
            const NOT_FOUND = 'not_found';
            const METHOD_NOT_ALLOWED = 'method_not_allowed';
            const UNPROCESSABLE_ENTITY = 'unprocessable_entity';
            const INTERNAL_SERVER_ERROR = 'internal_server_error';
            const SERVICE_UNAVAILABLE = 'service_unavailable';
        };
    }
    public static function HttpStatusCode()
    {
        return new class {
            const OK = 200;
            const CREATED = 201;
            const NO_CONTENT = 204;
            const BAD_REQUEST = 400;
            const UNAUTHORIZED = 401;
            const FORBIDDEN = 403;
            const NOT_FOUND = 404;
            const METHOD_NOT_ALLOWED = 405;
            const UNPROCESSABLE_ENTITY = 422;
            const INTERNAL_SERVER_ERROR = 500;
            const SERVICE_UNAVAILABLE = 503;
        };
    }
}
