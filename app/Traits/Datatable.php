<?php
namespace App\Traits;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

trait Datatable
{
    public $model = null;
    public $primaryKey = null;

    private $tableColumns = null;
    private $columns = array();
    private $exportFormats = array("copy", "csv", "excel", "pdf", "print");

    public $viewData = null;
    public $viewPath = "default.index";
    public $extendViewPath = null;
    public $controllerUrl = null;

    /**
     * @param $model
     */
    public function initDatatable($model)
    {
        $this->model = $model;

        //set variable, values
        $this->tableColumns=$this->getTableColumns();

        $this->viewData = (object) array();

        $this->viewData->enableList=false;
        $this->viewData->enableAdd=true;
        $this->viewData->enableEdit=true;
        $this->viewData->enableView=true;
        $this->viewData->enableDelete=false;
        $this->viewData->enableRestore=false;
        $this->viewData->enableTrash=false;
        $this->viewData->enableTrashList=false;

        if($this->viewData->enableTrashList)
        {
            $this->viewData->enableTrash=true;
            $this->viewData->enableDelete=false;
        }

        $this->viewData->enableExport=false;
        $this->viewData->exportFormats = $this->exportFormats;
    }

    /**
     * @param mixed $model
     * @return array
     */
    public function getTableColumns($model=false)
    {
        if(!$model)
        {
            $model = $this->model;
        }

        return $model->getConnection()->getSchemaBuilder()->getColumnListing($model->getTable());
    }

    /**
     * Setting which columns should be showed in view
     * @param array $newColumns  Comma separated columns list
     * @return Datatable
     */
    public function setColumns($newColumns=array())
    {
        $columns=$this->columns;

        if(is_array($newColumns) && count($newColumns) > 0)
        {
            foreach($newColumns as $column)
            {
                $columns[$column] = $this->buildDefaultColumn($column);
            }
        }
        else
        {
            $noa = func_num_args(); // number of argument passed,(Number of columns)

            for ($i=0; $i<$noa; $i++)
            {
                $column=func_get_arg($i); // get each argument passed

                $columns[$column] = $this->buildDefaultColumn($column);
            }
        }
        $this->columns=$columns;

        return $this;
    }

    /**
     * @param string $column
     * @return array
     */
    private function buildDefaultColumn($column)
    {
        $defaultColumn = [];

        $explode_del="_";
        $implode_del=" ";
        $column_label=ucwords(implode($implode_del, explode($explode_del, $column)));

        //set field and field's label
        $defaultColumn["label"]=$column_label;
        $defaultColumn["visible"]=true;
        $defaultColumn["filterMethod"]="normal";
        $defaultColumn["orderable"]=true;
        $defaultColumn["filterable"]=false;
        $defaultColumn["exportable"]=true;
        $defaultColumn["filterOptions"]=array();
        $defaultColumn["relation"]=""; //for fields which is having ORM relationships
        $defaultColumn["relation_field"]=""; //for fields which is having ORM relationships

        if($column == "id")
        {
            $this->primaryKey = $this->model->getKeyName();
            $defaultColumn["db_field"]=$this->primaryKey;
            $defaultColumn["searchable"]=false;
            $defaultColumn["order"]="DESC";
        }
        else
        {
            $defaultColumn["searchable"]=true;
            $defaultColumn["order"]="ASC";

            $defaultColumn["db_field"]=$column;
            $defaultColumn["fkey_field"]=$column;
        }

        return $defaultColumn;
    }

    /**
     * Setting field labels to pass to the view
     * @param array $unsetColumns
     * @return Datatable
     */
    public function unsetColumns($unsetColumns=array())
    {
        $columns=$this->columns;

        if(is_array($unsetColumns) && count($unsetColumns) > 0)
        {
            foreach($unsetColumns as $column)
            {
                if($column != "" && isset($columns[$column]))
                {
                    unset($columns[$column]);
                }
            }
        }
        else
        {
            $noa = func_num_args(); // number of argument passed,(Number of columns)

            for ($i=0; $i<$noa; $i++)
            {
                $column=func_get_arg($i); // get each argument passed

                if($column != "" && isset($columns[$column]))
                {
                    unset($columns[$column]);
                }
            }
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field labels to pass to the view
     * @param string $column
     * @param string $label
     * @return Datatable
     */
    public function setColumnLabel($column="", $label="")
    {
        $columns=$this->columns;
        if($column != "" && $label != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["label"]=$label;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field visibility to pass to the view
     * @param string $column
     * @param bool $visibility
     * @return Datatable
     */
    public function setColumnVisibility($column="", $visibility=true)
    {
        $columns=$this->columns;

        if($column != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["visible"]=$visibility;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field searchable to pass to the view
     * @param string $column
     * @param bool $searchable
     * @return Datatable
     */
    public function setColumnSearchability($column="", $searchable=true)
    {
        $columns=$this->columns;

        if($column != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["searchable"]=$searchable;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field search type to pass to the view
     * @param string $column
     * @param string $filterMethod
     * @param array $filterOptions
     * @return Datatable
     */
    public function setColumnFilterMethod($column="", $filterMethod="text", $filterOptions = array())
    {
        $columns=$this->columns;

        if($column != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["filterable"]=true;
            $columns[$column]["filterMethod"]=$filterMethod;
            $columns[$column]["filterOptions"]=$filterOptions;

            //filterMethod can be : text, select
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field orderable to pass to the view
     * @param string $column
     * @param bool $orderable
     * @param string $order
     * @return Datatable
     */
    public function setColumnOrderability($column="", $orderable=true, $order = "ASC")
    {
        $columns=$this->columns;

        if($column != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["orderable"]=$orderable;
            $columns[$column]["order"]=$order;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field exportable to pass to the view
     * @param string $column
     * @param bool $exportable
     * @return Datatable
     */
    public function setColumnExportability($column="", $exportable=true)
    {
        $columns=$this->columns;

        if($column != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["exportable"]=$exportable;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field orderable to pass to the view
     * @param string $column
     * @param string $db_field
     * @return Datatable
     */
    public function setColumnDBField($column="", $db_field="")
    {
        $columns=$this->columns;

        if($column != "" && $db_field != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["db_field"]=$db_field;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field orderable to pass to the view
     * @param string $column
     * @param string $fkey_field
     * @return Datatable
     */
    public function setColumnFKeyField($column="", $fkey_field="")
    {
        $columns=$this->columns;

        if($column != "" && $fkey_field != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["fkey_field"]=$fkey_field;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting field relation to match with the ORM
     * @param string $column
     * @param string $relation
     * @param string $relation_field
     * @return Datatable
     */
    public function setColumnRelation($column="", $relation, $relation_field)
    {
        $columns=$this->columns;

        if($column != "" && $relation != "" && $relation_field != "" && isset($columns[$column]))
        {
            //set field and field's label
            $columns[$column]["relation"]=$relation;
            $columns[$column]["relation_field"]=$relation_field;
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Setting fields, how to display in the output
     * @param string $column
     * @param $call_back
     * @param array $params
     * @return Datatable
     */
    public function setColumnDisplay($column="", $call_back, $params=array())
    {
        $columns=$this->columns;

        if($column != "" && isset($columns[$column]))
        {
            //set fields display settings
            $columns[$column]["render"]=call_user_func_array($call_back, $params);
        }

        $this->columns=$columns;

        return $this;
    }

    /**
     * Getting which fields to be filtered from the select query, that'll be executing
     * @return array
     */
    public function getColumns()
    {
        //check columns has been not set from controller
        if(count($this->columns) == 0)
        {
            //then set default table's columns
            $tableColumns=$this->tableColumns;

            $this->setColumns($tableColumns);
        }

        return $this->columns;
    }

    public function render($path)
    {
        $this->extendViewPath = $path;

        return $this;
    }

    /**
     * Generate columns to pass to the UI or read and serve data according to the request
     * @param $qBuilder
     * @return mixed
     */
    public function index($qBuilder)
    {
        if(isset($_POST["submit"]))
        {
            //create an instance of Form library
            $request = request();

            $draw=$request->post("draw");
            $start=$request->post("start");
            $length=$request->post("length");
            $columns=$request->post("columns");
            $order=$request->post("order");
            $search_get=$request->post("search");
            $model_columns=$this->getColumns();

            $main_search_value = "";
            if(isset($search_get) && is_array($search_get) && count($search_get) > 0)
            {
                $main_search_value=$search_get["value"];
            }

            if(isset($columns) && is_array($columns) && count($columns) > 0)
            {
                $searchFieldCount = 0;
                $defaultSearchFields = [];
                foreach($columns as $key => $column)
                {
                    $field=$column["data"];

                    $db_field=$model_columns[$field]["db_field"];
                    $filterable=$model_columns[$field]["filterable"];

                    $fkey_field=$field;
                    if(isset($model_columns[$field]["fkey_field"]))
                    {
                        $fkey_field=$model_columns[$field]["fkey_field"];
                    }

                    if($filterable)
                    {
                        $search=$column["search"];
                        $search_value=rawurldecode($search["value"]);

                        if($search_value != "")
                        {
                            $search_value_arr = @json_decode($search_value, true);
                            if(is_array($search_value_arr))
                            {
                                if(isset($search_value_arr["type"]))
                                {
                                    if($search_value_arr["type"] == "date_between")
                                    {
                                        $date_from = $search_value_arr["date_from"];
                                        $date_till = $search_value_arr["date_till"];

                                        $qBuilder->whereBetween("LEFT(".$db_field.",10)", [$date_from, $date_till]);
                                    }
                                }
                            }
                            else if(isset($model_columns[$field]["filterMethod"]) && $model_columns[$field]["filterMethod"] == "select")
                            {
                                $sv_exp_del = ",";
                                $search_value_exp = explode($sv_exp_del, $search_value);

                                if(is_array($search_value_exp) && count($search_value_exp)>1)
                                {
                                    $qBuilder->whereIn($fkey_field, $search_value_exp);
                                }
                                else
                                {
                                    $qBuilder->where($fkey_field, "=", $search_value);
                                }
                            }
                            else
                            {
                                $qBuilder->where($db_field, "LIKE", "%".$search_value."%");
                            }
                        }
                        else
                        {
                            $defaultSearchFields[] = $field;
                        }
                    }
                }

                //check if it has been set a default value for search
                if($main_search_value != "")
                {
                    if(count($defaultSearchFields)>0)
                    {
                        $qBuilder->where(function ($qBuilder) use($defaultSearchFields, $main_search_value, $model_columns){

                            foreach ($defaultSearchFields as $field)
                            {
                                $column = $model_columns[$field];

                                if($column["relation"] != "" && $column["relation_field"] != "")
                                {
                                    $relation=$column["relation"];
                                    $relation_field=$column["relation_field"];

                                    $qBuilder->orWhereHas($relation, function ($query) use ($relation_field, $main_search_value) {

                                        $query->where($relation_field, 'LIKE', '%'. $main_search_value .'%');
                                    });
                                }
                                else
                                {
                                    $db_field=$column["db_field"];
                                    $qBuilder->orWhere($db_field, "LIKE", "%".$main_search_value."%");
                                }
                            }
                        });
                    }
                }
            }

            //get count from sql query, because laravel is getting the count once after retrieving all the records according to the conditions
            //which has passed to the query builder. It consumes more memory and it's an unwanted operation
            //instead of that we will get the count of records directly from the database using db query
            $qBAll = $qBuilder->select(DB::raw("COUNT(DISTINCT ".$this->primaryKey.") AS count"))->first();
            $all_count = $qBAll["count"];

            //changing select, because query builder only knows above select, but not what we want
            $qBuilder->select("*");

            if(isset($order) && is_array($order) && count($order) > 0)
            {
                foreach($order as $key => $order_value)
                {
                    $field_order=$order_value["dir"];
                    $field_index=$order_value["column"];

                    $field=$columns[$field_index]["data"];

                    $db_field=$field;
                    if(isset($model_columns[$field]["db_field"]))
                    {
                        $db_field=$model_columns[$field]["db_field"];
                    }

                    $qBuilder->orderBy($db_field, $field_order);
                }
            }

            $results=$qBuilder->limit($length)->offset($start)->get();

            $data_output=[];

            if($results)
            {
                $filtered_count=count($results);

                $data_output["draw"]=$draw;
                $data_output["recordsTotal"]=$all_count;
                $data_output["recordsFiltered"]=$filtered_count;
                $data_output["data"]=$results;
            }
            else
            {
                $data_output["draw"]=$draw;
                $data_output["recordsTotal"]=0;
                $data_output["recordsFiltered"]=0;
                $data_output["data"]=[];
            }

            echo json_encode($data_output);
        }
        else
        {
            $this->viewData->columns=$this->getColumns();
            $this->set_index_urls();

            $viewData = $this->viewData;
            $extendViewPath = config("academic.datatable_template");

            if($this->extendViewPath != "")
            {
                $extendViewPath = $this->extendViewPath;
            }

            return view($this->viewPath, compact("extendViewPath", "viewData"));
        }
    }

    /**
     * Build viewData variable to pass to the UI
     * @return void
     */
    private function set_index_urls()
    {
        if(!isset($this->viewData->thisUrl))
        {
            $uri = request()->getPathInfo();

            $route = collect(\Route::getRoutes())->first(function($route) use($uri){

                $method = request()->method();
                return $route->matches(request()->create($uri, $method));
            });

            $uri = $route->uri;

            //get current url
            $this->viewData->thisUrl=URL::to($uri);

            $controllerUrl = $uri;

            //check for url params
            $curlyStart = strpos($controllerUrl, "{");
            if($curlyStart)
            {
                //get rest of the URL without URL params
                $controllerUrl = substr($controllerUrl, 0, $curlyStart);
            }

            $this->controllerUrl = URL::to($controllerUrl);
        }
        if(!isset($this->viewData->listUrl))
        {
            $listUrl = str_replace("/trash", "", $this->controllerUrl);

            $this->viewData->listUrl=$listUrl;
        }
        if(!isset($this->viewData->listUrlLabel))
        {
            $this->viewData->listUrlLabel="View List";
        }
        if(!isset($this->viewData->listUrlIcon))
        {
            $this->viewData->listUrlIcon="fa fa-list";
        }

        if(!isset($this->viewData->addUrl) && $this->viewData->enableAdd)
        {
            $this->viewData->addUrl=$this->controllerUrl."/create";
        }
        if(!isset($this->viewData->addUrlLabel))
        {
            $this->viewData->addUrlLabel="Add New";
        }
        if(!isset($this->viewData->addUrlIcon))
        {
            $this->viewData->addUrlIcon="Add New";
        }
        //----

        if(!isset($this->viewData->editUrl) && $this->viewData->enableEdit)
        {
            $this->viewData->editUrl=$this->controllerUrl."/edit/";
        }
        if(!isset($this->viewData->editUrlLabel))
        {
            $this->viewData->editUrlLabel="Edit";
        }
        if(!isset($this->viewData->editUrlIcon))
        {
            $this->viewData->editUrlIcon="fa fa-edit";
        }
        //----

        if(!isset($this->viewData->viewUrl) && $this->viewData->enableView)
        {
            $this->viewData->viewUrl=$this->controllerUrl."/view/";
        }
        if(!isset($this->viewData->viewUrlLabel))
        {
            $this->viewData->viewUrlLabel="view";
        }
        if(!isset($this->viewData->viewUrlIcon))
        {
            $this->viewData->viewUrlIcon="fa fa-list";
        }
        //----

        if(!isset($this->viewData->deleteUrl) && $this->viewData->enableDelete)
        {
            $this->viewData->deleteUrl=$this->controllerUrl."/destroy/";
        }
        if(!isset($this->viewData->deleteUrlLabel))
        {
            $this->viewData->deleteUrlLabel="Delete";
        }
        if(!isset($this->viewData->deleteUrlIcon))
        {
            $this->viewData->deleteUrlIcon="fa fa-trash";
        }
        //----

        if(!isset($this->viewData->restoreUrl) && $this->viewData->enableRestore)
        {
            $this->viewData->restoreUrl = str_replace(["/trash", "/trash/"], ["/restore/"], $this->controllerUrl);
        }
        if(!isset($this->viewData->restoreUrlLabel))
        {
            $this->viewData->restoreUrlLabel="Restore";
        }
        if(!isset($this->viewData->restoreUrlIcon))
        {
            $this->viewData->restoreUrlIcon="fas fa-trash-restore";
        }
        //----

        if(!isset($this->viewData->trashUrl) && $this->viewData->enableTrash)
        {
            $this->viewData->trashUrl = $this->controllerUrl."/delete/";
        }
        if(!isset($this->viewData->trashUrlLabel))
        {
            $this->viewData->trashUrlLabel="Trash";
        }
        if(!isset($this->viewData->trashUrlIcon))
        {
            $this->viewData->trashUrlIcon="fa fa-trash";
        }
        //----

        if(!isset($this->viewData->trashListUrl) && $this->viewData->enableTrashList)
        {
            $this->viewData->trashListUrl = $this->controllerUrl."/trash";
        }
        if(!isset($this->viewData->trashListUrlLabel))
        {
            $this->viewData->trashListUrlLabel="View Trash";
        }
        if(!isset($this->viewData->trashListUrlIcon))
        {
            $this->viewData->trashListUrlIcon="fa fa-trash";
        }
        //----
    }

    /**
     * @param string $actions Comma separated actions list
     * @return Datatable
     */
    public function enableViewData($actions)
    {
        // number of argument passed,(Number of columns)
        $noa = func_num_args();

        for ($i=0; $i<$noa; $i++)
        {
            //get each argument passed
            $action=func_get_arg($i);

            $property = "enable".ucfirst($action);
            $this->viewData->$property = true;
        }

        return $this;
    }

    /**
     * @param string $actions Comma separated actions list
     * @return Datatable
     */
    public function disableViewData($actions)
    {
        // number of argument passed,(Number of columns)
        $noa = func_num_args();

        for ($i=0; $i<$noa; $i++)
        {
            //get each argument passed
            $action=func_get_arg($i);

            $property = "enable".ucfirst($action);
            $this->viewData->$property = false;
        }

        return $this;
    }

    /**
     * @param string $action
     * @param string $url
     * @return Datatable
     */
    public function setUrl($action, $url="")
    {
        $property = $action."Url";

        $this->viewData->$property = $url;

        return $this;
    }

    /**
     * @param string $action
     * @param string $label
     * @return Datatable
     */
    public function setUrlLabel($action, $label="")
    {
        $property = $action."UrlLabel";

        $this->viewData->$property = $label;

        return $this;
    }

    /**
     * @param string $action
     * @param string $icon FontAwesome or any icon class/classes which is using in the theme
     * @return Datatable
     */
    public function setUrlIcon($action, $icon="")
    {
        $property = $action."UrlIcon";

        $this->viewData->$property = $icon;

        return $this;
    }

    /**
     * @param string $title Title for the datatable records list
     * @return Datatable
     */
    public function setTableTitle($title)
    {
        $this->viewData->tableTitle = $title;

        return $this;
    }

    /**
     * Setting which columns should be showed in view
     * @param array $formats
     * @return Datatable
     */
    public function setExportFormats($formats=array())
    {
        $defaultFormats = $this->exportFormats;

        $exportFormats = [];
        if(is_array($formats) && count($formats) > 0)
        {
            foreach($formats as $format)
            {
                if(in_array($format, $defaultFormats))
                {
                    $exportFormats[]=$format;
                }
            }
        }
        else
        {
            $noa = func_num_args(); // number of argument passed,(Number of columns)

            for ($i=0; $i<$noa; $i++)
            {
                $format=func_get_arg($i); // get each argument passed

                if(in_array($format, $defaultFormats))
                {
                    $exportFormats[]=$format;
                }
            }
        }

        if(count($exportFormats)>0)
        {
            $this->viewData->exportFormats = $exportFormats;
        }

        return $this;
    }

    /**
     * Show the ui for displaying record modified details
     * @return Factory|View
     */
    public function display_created_at_as()
    {
        return view("default.common.created_modified_ui");
    }

    /**
     * @param $states
     * @return Factory|View
     */
    public function display_status_as($states=array())
    {
        if(!is_array($states) || count($states)==0)
        {
            //state value, state name (Option), css class for label
            $states = array();
            $states[]=array("id"=>"0", "name"=>"Disabled", "label"=>"danger");
            $states[]=array("id"=>"1", "name"=>"Enabled", "label"=>"success");
        }

        return view("default.common.status_ui", compact('states'));
    }
}
