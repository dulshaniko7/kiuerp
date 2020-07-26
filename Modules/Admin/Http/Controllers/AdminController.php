<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Modules\Admin\Repositories\AdminRepository;
use Modules\Admin\Entities\Admin;

class AdminController extends Controller
{
    private $repository = null;
    private $trash = false;

    public function __construct()
    {
        $this->repository = new AdminRepository(new Admin());
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function index()
    {
        $this->repository->viewData->page_title = "Admins";

        $this->repository->viewData->enable_export = true;

        $this->repository->setColumns("id", "name", "dept_code", "faculty", "dept_status", "created_at", "updated_at")
            ->setColumnLabel("dept_code", "Code")
            ->setColumnLabel("name", "Admin")
            ->setColumnLabel("dept_status", "Status")
            ->setColumnDisplay("dept_status", array($this->repository, 'display_status_as'))
            ->setColumnDisplay("faculty", array($this->repository, 'display_faculty_as'))
            ->setColumnDisplay("created_at", array($this->repository, 'display_created_at_as'))

            ->setColumnVisibility("updated_at", false)

            ->setColumnSearchType("name", "text")
            ->setColumnSearchType("dept_status", "select", [["id" =>"1", "value" =>"Enabled"], ["id" =>"0", "value" =>"Disabled"]])
            ->setColumnSearchType("faculty", "select", URL::to("/academic/faculty/searchData"))

            ->setColumnSearchability("created_at", false)
            ->setColumnSearchability("updated_at", false)

            ->setColumnDBField("faculty", "admin_role_id")
            ->setColumnFKeyField("faculty", "admin_role_id")
            ->setColumnRelation("faculty", "faculty", "faculty_name");

        if($this->trash)
        {
            $query = $this->repository->model::onlyTrashed();

            $this->repository->viewData->enable_restore = true;
            $this->repository->viewData->enable_view= false;
            $this->repository->viewData->enable_edit = false;
            $this->repository->viewData->enable_delete = false;
        }
        else
        {
            $query = $this->repository->model;
        }

        $query = $query->with(["faculty"]);

        return $this->repository->render("academic::layouts.master")->index($query);
    }

    /**
     * Display a listing of the resource.
     * @return Factory|View
     */
    public function trash()
    {
        $this->trash = true;
        return $this->index();
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|View
     */
    public function create()
    {
        $formMode = "add";
        $formSubmitUrl = "/".request()->path();
        $faculty = null;

        return view('academic::department.create', compact('formMode', 'formSubmitUrl', 'faculty'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $model = new Admin();

        $postData = Validator::make($request->all(), [
            "admin_role_id" => "required|exists:admin_roles,admin_role_id",
            "name" => "required|min:3",
            "email" => "unique:Modules\Admin\Entities\Admin,email",
        ], [], ["admin_role_id" => "Faculty", "name" => "Admin name"]);

        if ($postData->fails())
        {
            return $this->repository->handleValidationErrors($postData->errors());
        }
        else
        {
            $data = $postData->validated();
        }

        foreach ($data as $key => $value)
        {
            $model->$key = $value;
        }

        //set dept_status as 0 when inserting the record
        $model->status = 0;

        $dataResponse = $this->repository->saveModel($model);

        return $this->repository->handleResponse($dataResponse);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Factory|View
     */
    public function show($id)
    {
        $model = Admin::find($id);

        if($model)
        {
            $record = $model;

            return view('academic::department.view', compact('data', 'record'));
        }
        else
        {
            abort(404, "Requested record does not exist.");
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $model = Admin::find($id);

        if($model)
        {
            $record = $model;
            $faculty = $model->faculty;
            $formMode = "edit";
            $formSubmitUrl = "/".request()->path();

            return view('academic::department.create', compact('formMode', 'formSubmitUrl', 'record', 'faculty'));
        }
        else
        {
            abort(404, "Requested record does not exist.");
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $model = Admin::find($id);

        if($model)
        {
            $postData = Validator::make($request->all(), [
                "admin_role_id" => "required|exists:admin_roles,admin_role_id",
                "name" => "required|min:3",
                "email" => [Rule::requiredIf(function () use ($model) { return $model->default_admin == "0";}), Rule::unique('admins', "email")->ignore($model->admin_id, $model->getKeyName())],
                "status" => "required|digits:1",
            ], [], ["admin_role_id" => "Admin role", "name" => "Admin name"]);

            if ($postData->fails())
            {
                return $this->repository->handleValidationErrors($postData->errors());
            }
            else
            {
                $data = $postData->validated();
            }

            foreach ($data as $key => $value)
            {
                $model->$key = $value;
            }

            $dataResponse = $this->repository->saveModel($model);
        }
        else
        {
            $notify = array();
            $notify["status"]="failed";
            $notify["notify"][]="Details saving was failed. Requested record does not exist.";

            $dataResponse["notify"]=$notify;
        }

        return $this->repository->handleResponse($dataResponse);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse|RedirectResponse
     */
    public function destroy($id)
    {
        $model = Admin::find($id);

        if($model)
        {
            if($model->delete())
            {
                $notify = array();
                $notify["status"]="success";
                $notify["notify"][]="Successfully moved the record to trash.";

                $dataResponse["notify"]=$notify;
            }
            else
            {
                $notify = array();
                $notify["status"]="failed";
                $notify["notify"][]="Details moving to trash was failed. Unknown error occurred.";

                $dataResponse["notify"]=$notify;
            }
        }
        else
        {
            $notify = array();
            $notify["status"]="failed";
            $notify["notify"][]="Details moving to trash was failed. Requested record does not exist.";

            $dataResponse["notify"]=$notify;
        }

        return $this->repository->handleResponse($dataResponse);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse|RedirectResponse
     */
    public function restore($id)
    {
        $model = Admin::withTrashed()->find($id);

        if($model)
        {
            if($model->restore())
            {
                $notify = array();
                $notify["status"]="success";
                $notify["notify"][]="Successfully restored the record from trash.";

                $dataResponse["notify"]=$notify;
            }
            else
            {
                $notify = array();
                $notify["status"]="failed";
                $notify["notify"][]="Details restoring from trash was failed. Unknown error occurred.";

                $dataResponse["notify"]=$notify;
            }
        }
        else
        {
            $notify = array();
            $notify["status"]="failed";
            $notify["notify"][]="Details restoring from trash was failed. Requested record does not exist.";

            $dataResponse["notify"]=$notify;
        }

        return $this->repository->handleResponse($dataResponse);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @return JsonResponse
     */
    public function searchData(Request $request)
    {
        if($request->expectsJson())
        {
            $searchText = $request->post("searchText");
            $idNot = $request->post("idNot");

            $query = Admin::query()
                ->select("dept_id", "name")
                ->where("dept_status", "1")
                ->orderBy("name")
                ->limit(10);

            if($searchText != "")
            {
                $query = $query->where("name", "LIKE", $searchText."%");
            }

            if($idNot != "")
            {
                $query = $query->whereNotIn("dept_id", [$idNot]);
            }

            $data = $query->get();

            return response()->json($data, 201);
        }

        abort("403", "You are not allowed to access this data");
    }
}
