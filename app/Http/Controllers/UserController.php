<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Repository\User\UserRepositoryInterface;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
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
        if (!Role::findOrFail(Request::input('role_id'))->user()->save($model)) {
            throw new Exception('Role attach fail', 1);
        }
    }

    // /**
    //  * mengoveride fungsi yang ada di parentnya.
    //  *
    //  * @return [type] [description]
    //  */
    // public function store()
    // {
    //     $request = app($this->getRequestName());
    //     if ($request->ajax()) {
    //         if (method_exists($this, 'crudCallback')) {
    //             $req = call_user_func_array([$this, 'crudCallback'], [$request]);
    //             if (!is_null($req) && $req instanceof Request) {
    //                 $request = $req;
    //             }
    //         }
    //         //make model or update model
    //         DB::beginTransaction();
    //         try {
    //             $model = $this->getModel()->insert($request->only($this->getRequestField()));
    //             if (method_exists($this, 'callbackAfterCreateOrUpdate')) {
    //                 $this->callbackAfterCreateOrUpdate($model);
    //             }
    //             DB::commit();

    //             return [
    //                 'message' => 'user berhasil di simpan',
    //                 'url' => route('admin.user.index'),
    //                 'type' => 'success',
    //             ];
    //         } catch (Exception $e) {
    //             DB::rollback();
    //             throw $e;
    //             return [
    //                 'message' => $e->getMessage(),
    //                 'type' => 'error',
    //             ];
    //         }
    //     }

    //     return parent::store();
    // }
}
