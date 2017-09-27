<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Repository\User\UserRepositoryInterface;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Request;

class UserController extends Controller
{
    protected $model;
    protected $requestName;
    protected $requestField;

    public function __construct()
    {
        $this->model = app(UserRepositoryInterface::class);
        $this->requestName = UserRequest::class;
        $this->requestField = ['name', 'email', 'password'];
        parent::__construct();
    }

    public function crudCallback($request)
    {
    	//ada proses upload file
    	$this->requestField = $request->has('password') ? ['name', 'email', 'password'] : ['name', 'email'];
    }

    public function callbackAfterCreateOrUpdate(User $model)
    {
        if(!Role::findOrFail(Request::input('role_id'))->user()->save($model)){
            throw new Exception("Role attach fail", 1);
            
        }
    }


}
