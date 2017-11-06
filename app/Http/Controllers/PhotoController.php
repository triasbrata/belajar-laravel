<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequest;

class PhotoController extends Controller
{
    protected $model;
    protected $requestName;
    protected $requestField;

    public function __construct()
    {
        $this->model = app(PhotoRepositoryInterface::class);
        $this->requestName = PhotoRequest::class;
        $this->requestField = ['name', 'email', 'password'];
    }

    public function update($id)
    {
        $this->requestField = \Request::has('password') ? ['name', 'email', 'password']
                                                       : ['name', 'email'];

        return parent::update($id);
    }
}
