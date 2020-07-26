<?php
namespace App\Repositories;

use Illuminate\Support\Facades\View;

class BaseRepository extends DatatableRepository
{
    public $urls = null;
    public function __construct($model)
    {
        parent::__construct($model);

        $this->setViewComposer();
    }

    private function setViewComposer()
    {
        $this->urls = (object)array();

        View::composer("*", function ($view){

            $data = array();
            if(isset($view->getData()["data"]))
            {
                $data = $view->getData()["data"];
            }

            if(!isset($data["urls"]))
            {
                $data["urls"]=$this->getUrls();
            }

            $view->with("data", $data);
        });
    }

    private function getUrls()
    {
        $urls = array();
        if(isset($this->urls))
        {
            $urls = json_decode(json_encode($this->urls), true);
            //$urls = PermissionValidate::getPermissionValidated($urls);
        }

        return new \ArrayObject($urls);
    }

    public function saveModel($model)
    {
        $save = $model->save();

        if($save)
        {
            $notify = array();
            $notify["status"]="success";
            $notify["notify"][]="Successfully saved the details.";

            $dataResponse["record"]=$model;
            $dataResponse["notify"]=$notify;
        }
        else
        {
            $notify = array();
            $notify["status"]="failed";
            $notify["notify"][]="Details saving was failed";

            $dataResponse["notify"]=$notify;
        }

        return $dataResponse;
    }

    public function handleValidationErrors($errors)
    {
        $errors = json_decode(json_encode($errors), true);

        $response = array();
        $response["status"]="failed";
        $response["notify"]=[];

        foreach($errors as $error)
        {
            $response["notify"][]=$error;
        }

        return BaseRepository::handleResponse($response);
    }

    public function handleResponse($dataResponse)
    {
        if(request()->expectsJson())
        {
            return response()->json($dataResponse, 201);
        }
        else
        {
            request()->session()->flash("notify", $dataResponse["notify"]);
            return redirect()->back();
        }
    }
}