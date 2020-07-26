<?php
namespace App\Repositories;

use ArrayObject;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Traits\Datatable;

class BaseRepository
{
    use Datatable;

    private $urls = [];

    public function __construct()
    {
        $this->setViewComposer();
    }

    /**
     * Setup view variables
     * @return void
     */
    private function setViewComposer()
    {
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

    /**
     * @param string $accessKey Key variable to access the URL from array
     * @param string $url System URL
     * @return void
     */
    public function setUrl($accessKey, $url)
    {
        $this->urls[$accessKey] = $url;
    }

    /**
     * @param array $urls List of URLs with array
     * @return void
     */
    public function setUrls($urls)
    {
        if(is_array($urls) && count($urls)>0)
        {
            foreach ($urls as $key => $url)
            {
                $this->urls[$key] = $url;
            }
        }
    }

    /**
     * @return ArrayObject
     */
    public function getUrls()
    {
        $urls = array();
        if(count($this->urls)>0)
        {
            $urls = $this->urls;
            //$urls = PermissionValidate::getPermissionValidated($this->urls);
        }

        return new ArrayObject($urls);
    }

    /**
     * @param $model
     * @return array
     */
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

    /**
     * @param $model
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @return mixed
     */
    public function getValidatedData($model, $rules, $messages=[], $customAttributes=[])
    {
        $postData = Validator::make(request()->all(), $rules, $messages, $customAttributes);

        if ($postData->fails())
        {
            return $this->handleValidationErrors($postData->errors());
        }
        else
        {
            $data = $postData->validated();
        }

        foreach ($data as $key => $value)
        {
            $model->$key = $value;
        }

        return $model;
    }

    /**
     * @param $errors
     * @return mixed
     */
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

    /**
     * @param array $dataResponse
     * @return mixed
    */
    public function handleResponse($dataResponse=[])
    {
        if(request()->expectsJson())
        {
            return response()->json($dataResponse, 201);
        }
        else
        {
            if(isset($dataResponse["status"]))
            {
                request()->session()->flash("status", $dataResponse["status"]);
            }
            request()->session()->flash("notify", $dataResponse["notify"]);
            return redirect()->back();
        }
    }
}
