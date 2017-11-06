<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Repository\Role\RoleRepositoryInterface;

class RoleController extends Controller
{
    protected $model;
    protected $requestName;
    protected $requestField;

    public function __construct()
    {
        $this->model = app(RoleRepositoryInterface::class);
        $this->requestName = RoleRequest::class;
        $this->requestField = ['title'];
        parent::__construct();
    }
}
