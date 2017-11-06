<?php

namespace Thortech\Providers\Traits;

use Illuminate\Http\Request;

trait CRUDHelperTrait
{
    /**
     * untuk menampilkan view.
     *
     * @return view
     */
    public function view()
    {
        return call_user_func_array('view', func_get_args());
    }

    /**
     * mengambil nama request.
     *
     * @return string
     */
    public function getRequestName()
    {
        // if(!property_exists($this,'requestName') && $this->requestName == null)
        // 	throw new Exception("request name is needed", 1);
        return $this->requestName;
    }

    /**
     * mengambil model.
     *
     * @return model
     */
    public function getModel()
    {
        // if(!property_exists($this,'model') && $this->model == null)
        // 	throw new Exception("model is needed", 1);
        return $this->model;
    }

    /**
     * mengambil field request yang dibutuhkan.
     *
     * @return array
     */
    public function getRequestField()
    {
        // if(!property_exists($this,'requestField') && $this->requestField == null)
        // 	throw new Exception("request field is needed", 1);
        return $this->requestField;
    }

    /**
     * meng-redirect pengguna kembali ke tampilan awal.
     *
     * @return redirect
     */
    public function redirectToIndex(Request $request)
    {
        if ($request->ajax()) {
            return [
                'message' => 'Berhasil Menambah/Memperbarui data',
                'url' => route('admin.'.$this->module.'.index'),
                'type' => 'success',
            ];
        }

        return redirect()->route('admin.'.$this->module.'.index')
                         ->withMessage('Berhasil Menambah/Memperbarui data');
    }

    /**
     * meng-redirect user kembali ke halaman sebelumnya beserta
     * input dan error.
     *
     * @return redirect
     */
    public function redirectBackWithError(Request $request)
    {
        if ($request->ajax()) {
            return [
                 'message' => 'Gagal aksi',
                 'type' => 'error',
            ];
        }

        return redirect()->back()->withInput()->withError('Gagal aksi');
    }

    /**
     * fungsi untuk mengganti request yang sudah ada.
     *
     * @param request $request
     * @param array   $newAttribute
     *
     * @return request
     */
    public function replaceRequest($request, $newAttribute)
    {
        return $request->merge($newAttribute);
    }
}
