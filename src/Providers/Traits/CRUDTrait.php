<?php namespace Thortech\Providers\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait CRUDTrait{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->getModel()->getItems();
        return $this->view($this->module.'.index',compact('items'))->with('module',$this->module);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view($this->module.'.create')->with('module',$this->module);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $request = app($this->getRequestName());
        if(method_exists($this,"crudCallback")){
            $req = call_user_func_array([$this,"crudCallback"], [$request]);
            if(!is_null($req) && $req instanceof Request){
                $request = $req;
            }
            
        }
        //make model or update model
        DB::beginTransaction();
        try {
            $model = $this->getModel()->insert($request->only($this->getRequestField()));
            if(method_exists($this,'callbackAfterCreateOrUpdate')){
                $this->callbackAfterCreateOrUpdate($model);
            }
            DB::commit();
            return $this->redirectToIndex();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
            return $this->redirectBackWithError();
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$item = $this->getModel()->finditem($id);
        return $this->view($this->module.'.show',['item'=>$item])->with('module',$this->module);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$item = $this->getModel()->findItem($id);
        $view =  $this->view($this->module.'.edit',['item'=>$item])->with('module',$this->module);
        if(method_exists($this,'embedDataToEdit')){
        	$view->with($this->embedDataToEdit());
        }
        return $view;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $request = app($this->getRequestName());

        if(method_exists($this,"crudCallback")){
            $req = call_user_func_array([$this,"crudCallback"], [$request]);
            if(!is_null($req) && $req instanceof Request){
                $request = $req;
            }
        }


        //make model or update model
        
        DB::beginTransaction();
        try {
            $model = $this->getModel()->update($id,$request->only($this->getRequestField()));
            if(method_exists($this,'callbackAfterCreateOrUpdate')){
                $this->callbackAfterCreateOrUpdate($model);
            }
            DB::commit();
            return $this->redirectToIndex();
        } catch (Exception $e) {
            
            DB::rollback();
            throw $e;
            
            return $this->redirectBackWithError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return $this->getModel()->delete($id)
			  ? $this->redirectToIndex()
        	  : $this->redirectBackWithError();
    }

}