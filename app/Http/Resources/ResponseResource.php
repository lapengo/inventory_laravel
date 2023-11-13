<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\EnumsHelper;

class ResponseResource extends JsonResource
{
    public $status;
    public $message;

    public function __construct($statusCode, $resource)
    {
        parent::__construct($resource);
        $getStatus = $this->_setStatus($statusCode);
        $this->status = $getStatus->status;
        $this->message = $getStatus->message;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'code'   => $this->status,
            'message'   => $this->message,
            'data'      => $this->resource
        ];
    }

    private function _setStatus($status)
    {
        switch ($status) {
            case EnumsHelper::HttpStatusCode()::OK:
                $this->status = EnumsHelper::HttpStatusCode()::OK;
                $this->message = EnumsHelper::HttpStatusRes()::OK;
                break;
            case EnumsHelper::HttpStatusCode()::CREATED:
                $this->status = EnumsHelper::HttpStatusCode()::CREATED;
                $this->message = EnumsHelper::HttpStatusRes()::CREATED;
                break;
            case EnumsHelper::HttpStatusCode()::NO_CONTENT:
                $this->status = EnumsHelper::HttpStatusCode()::NO_CONTENT;
                $this->message = EnumsHelper::HttpStatusRes()::NO_CONTENT;
                break;
            case EnumsHelper::HttpStatusCode()::BAD_REQUEST:
                $this->status = EnumsHelper::HttpStatusCode()::BAD_REQUEST;
                $this->message = EnumsHelper::HttpStatusRes()::BAD_REQUEST;
                break;
            case EnumsHelper::HttpStatusCode()::UNAUTHORIZED:
                $this->status = EnumsHelper::HttpStatusCode()::UNAUTHORIZED;
                $this->message = EnumsHelper::HttpStatusRes()::UNAUTHORIZED;
                break;
            case EnumsHelper::HttpStatusCode()::FORBIDDEN:
                $this->status = EnumsHelper::HttpStatusCode()::FORBIDDEN;
                $this->message = EnumsHelper::HttpStatusRes()::FORBIDDEN;
                break;
            case EnumsHelper::HttpStatusCode()::NOT_FOUND:
                $this->status = EnumsHelper::HttpStatusCode()::NOT_FOUND;
                $this->message = EnumsHelper::HttpStatusRes()::NOT_FOUND;
                break;
            case EnumsHelper::HttpStatusCode()::METHOD_NOT_ALLOWED:
                $this->status = EnumsHelper::HttpStatusCode()::METHOD_NOT_ALLOWED;
                $this->message = EnumsHelper::HttpStatusRes()::METHOD_NOT_ALLOWED;
                break;
            case EnumsHelper::HttpStatusCode()::UNPROCESSABLE_ENTITY:
                $this->status = EnumsHelper::HttpStatusCode()::UNPROCESSABLE_ENTITY;
                $this->message = EnumsHelper::HttpStatusRes()::UNPROCESSABLE_ENTITY;
                break;
            case EnumsHelper::HttpStatusCode()::INTERNAL_SERVER_ERROR:
                $this->status = EnumsHelper::HttpStatusCode()::INTERNAL_SERVER_ERROR;
                $this->message = EnumsHelper::HttpStatusRes()::INTERNAL_SERVER_ERROR;
                break;
            case EnumsHelper::HttpStatusCode()::SERVICE_UNAVAILABLE:
                $this->status = EnumsHelper::HttpStatusCode()::SERVICE_UNAVAILABLE;
                $this->message = EnumsHelper::HttpStatusRes()::SERVICE_UNAVAILABLE;
                break;
            default:
                $this->status = EnumsHelper::HttpStatusCode()::NOT_FOUND;
                $this->message = EnumsHelper::HttpStatusRes()::NOT_FOUND;
                break;
        }
        return (object)[
            'status' => $this->status,
            'message' => $this->message
        ];
    }
}
