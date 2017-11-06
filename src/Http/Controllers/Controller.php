<?php

namespace Thortech\Http\Controllers;

use Thortech\Providers\Traits\CRUDHelperTrait;
use Thortech\Providers\Traits\CRUDTrait;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected $requestName;
    protected $model;
    protected $requestField;
    protected $module;

    use AuthorizesRequests,
        AuthorizesResources,
        DispatchesJobs,
        ValidatesRequests,
        CRUDHelperTrait,
        CRUDTrait;

    /**
     * fungsi ini yang akan dieksekusi
     * pertamakali ketika class dijalankan.
     *
     * @return [type] [description]
     */
    public function __construct()
    {
        $namespace = $this->getNamespace();
        $this->module = snake_case(str_replace([$namespace, 'Controller', '\\'], '', get_class($this)));
    }

    /**
     * fungsi untuk mendapatkan
     * namespace dari class itu sendiri.
     *
     * @return [type] [description]
     */
    private function getNamespace()
    {
        $reflection = new \ReflectionClass($this);

        return $reflection->getNamespaceName();
    }
}
