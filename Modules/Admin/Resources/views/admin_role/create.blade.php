@extends('admin::layouts.master')

@section('page_content')
    <form action="javascript:;" id="create_form">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                if($formMode == "add")
                                {
                                    ?>
                                    <h4 class="header-title">Add New Administrator Role</h4>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <h4 class="header-title">Edit Administrator Role</h4>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <div class="float-right">
                                    <?php
                                    if($formMode=="edit")
                                    {
                                        if(isset($urls["addUrl"]))
                                        {
                                            ?>
                                            <a href="{{$urls["addUrl"]}}">
                                                <div class="btn btn-info btn-sm"><span class="fa fa-plus"></span> Add New</div>
                                            </a>
                                            <?php
                                        }
                                    }

                                    if(isset($urls["listUrl"]))
                                    {
                                        ?>
                                        <a href="{{$urls["listUrl"]}}">
                                            <div class="btn btn-info btn-sm"><span class="fa fa-list"></span> List Administrator Roles</div>
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Administrator Role Name</label>
                                            <hr class="mt-1 mb-2">
                                            <input type="text" class="form-control" name="role_name" placeholder="Administrator Role Name" value="<?php echo $record["role_name"]; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <hr class="mt-1 mb-2">
                                            <textarea class="form-control" name="description" placeholder="Description"><?php echo $record["description"]; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Allowed Roles To Handle</label>
                                            <hr class="mt-1 mb-2">
                                            <input type="text" class="form-control" name="allowed_roles">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <?php
                                if(is_array($systemPermissions) && count($systemPermissions)>0)
                                {
                                    ?>
                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                <?php
                                                $i=0;
                                                foreach ($systemPermissions as $system)
                                                {
                                                    $i++;

                                                    $active = "";
                                                    if($i == 1)
                                                    {
                                                        $active = "active";
                                                    }
                                                    ?>
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo $active; ?>" id="custom-tabs-<?php echo $system["system_slug"] ?>-tab" data-toggle="pill" href="#custom-tabs-<?php echo $system["system_slug"] ?>" role="tab" aria-controls="custom-tabs-<?php echo $system["system_slug"] ?>" aria-selected="true"><?php echo $system["system_name"] ?></a>
                                                    </li>
                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                                <?php
                                                $i=0;
                                                foreach ($systemPermissions as $system)
                                                {
                                                    $i++;

                                                    $active = "";
                                                    if($i == 1)
                                                    {
                                                        $active = "show active";
                                                    }

                                                    $modules = $system["modules"];
                                                    $curr_permissions = $system["curr_permissions"];
                                                    $systemId = $system["id"];
                                                    ?>
                                                    <div class="tab-pane fade <?php echo $active; ?>" id="custom-tabs-<?php echo $system["system_slug"] ?>" role="tabpanel" aria-labelledby="custom-tabs-<?php echo $system["system_slug"] ?>-tab">
                                                    <input type="hidden" name="system_id[]" value="<?php echo $systemId; ?>">

                                                        <?php
                                                        if(is_array($modules) && count($modules)>0)
                                                        {
                                                            foreach ($modules as $modKey => $module)
                                                            {
                                                                $modName = $module["name"];
                                                                $modSlug = $module["slug"];
                                                                $moduleId = $module["module_id"];
                                                                $groups = $module["groups"];
                                                                ?>
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <input type="hidden" name="modules[]" value="<?php echo $systemId; ?>_<?php echo $modKey; ?>">
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <p class="text-muted">Permission Module</p>
                                                                                        <div class="input-group">
                                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <input type="checkbox" name="<?php echo $systemId; ?>_<?php echo $modKey; ?>_checked" value="1" onchange="return onChangeModule(<?php echo $systemId; ?>, <?php echo $modKey; ?>, false);">
                                                                                </span>
                                                                                            </div>
                                                                                            <input type="text" value="<?php echo $modName; ?>" class="form-control" readonly>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr>

                                                                        <?php
                                                                        if(is_array($groups) && count($groups)>0)
                                                                        {
                                                                            foreach ($groups as $groupKey => $group)
                                                                            {
                                                                                $groupName = $group["name"];
                                                                                $groupSlug = $group["slug"];
                                                                                $groupId = $group["group_id"];
                                                                                $permissions = $group["permissions"];
                                                                                ?>
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <div class="col-md-12">
                                                                                            <input type="hidden" name="<?php echo $systemId; ?>_<?php echo $modKey; ?>_groups[]" value="<?php echo $groupKey; ?>">
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <p class="text-muted">Permission Module Group</p>
                                                                                                    <div class="input-group">
                                                                                                        <div class="input-group-prepend">
                                                                                                    <span class="input-group-text">
                                                                                                        <input type="checkbox" name="<?php echo $systemId; ?>_<?php echo $modKey."_".$groupKey; ?>_checked" value="1" onchange="return onChangeGroup(<?php echo $systemId; ?>, <?php echo $modKey; ?>, <?php echo $groupKey; ?>, false);">
                                                                                                    </span>
                                                                                                        </div>
                                                                                                        <input type="text" value="<?php echo $groupName; ?>" class="form-control" readonly>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr>

                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                <?php
                                                                                                if(is_array($permissions) && count($permissions)>0)
                                                                                                {
                                                                                                    foreach ($permissions as $permKey => $permission)
                                                                                                    {
                                                                                                        $permName = $permission["name"];
                                                                                                        $hash = $permission["hash"];
                                                                                                        $action = $permission["action"];
                                                                                                        $permId = $permission["perm_id"];

                                                                                                        $checked = "";
                                                                                                        if(in_array($permId, $curr_permissions))
                                                                                                        {
                                                                                                            $checked = "checked";
                                                                                                        }
                                                                                                        ?>
                                                                                                        <div class="row">
                                                                                                            <div class="col-md-12">
                                                                                                                <input type="hidden" name="<?php echo $systemId; ?>_perm_id[]" value="<?php echo $permId; ?>">
                                                                                                                <input type="hidden" name="<?php echo $systemId; ?>_<?php echo $modKey."_".$groupKey; ?>_permissions[]" value="<?php echo $permKey; ?>">
                                                                                                                <div class="input-group mb-3">
                                                                                                                    <div class="input-group-prepend">
                                                                                                                        <span class="input-group-text">
                                                                                                                            <input type="checkbox" name="<?php echo $systemId; ?>_<?php echo $modKey."_".$groupKey."_".$permKey; ?>_checked" value="1" onchange="return onChangePerm(<?php echo $systemId; ?>, <?php echo $modKey; ?>, <?php echo $groupKey; ?>, false);" <?php echo $checked; ?> class="perm_<?php echo $systemId; ?>_<?php echo $permId; ?>_checked">
                                                                                                                        </span>
                                                                                                                    </div>
                                                                                                                    <input type="text" value="<?php echo $permName; ?>" class="form-control" readonly>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    <script>
                                                                                                        window.onload = function()
                                                                                                        {
                                                                                                            onChangePerm(<?php echo $systemId; ?>, <?php echo $modKey; ?>, <?php echo $groupKey; ?>, true);
                                                                                                        }
                                                                                                    </script>
                                                                                                        <?php
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        window.onload = function()
                                        {
                                            udpatePermissions(<?php echo $systemId; ?>);
                                        }
                                    </script>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-3">
                                    <label>Enable/Disable Administrator Role<span
                                            class="text-danger">*</span></label>
                                    <select name="role_status" class="form-control">
                                        <option value="1" <?php if ($record["role_status"] == "1") { ?> selected="selected" <?php } ?>>
                                            Enable
                                        </option>
                                        <option value="0" <?php if ($record["role_status"] == "0") { ?> selected="selected" <?php } ?>>
                                            Disable
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group" style="margin-top: 30px;">
                                    <button type="submit" class="btn btn-success btn-add-row">Save</button>
                                </div>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
    $admin_role_id = [];
    if(isset($record["allowed_roles"]))
    {
        $admin_role_id=$record["allowed_roles"];
    }
    ?>
    <script>
        let admin_role_id_ms=null;
        let permissions=[];

        window.onload = function()
        {
            submitCreateForm();

            admin_role_id_ms = $("input[name='allowed_roles']").magicSuggest({
                allowFreeEntries: false,
                maxSelection:999,
                data: "/admin/admin_role/search_data",
                dataUrlParams:{"_token":"{{ csrf_token() }}"},
                value:<?php echo json_encode($admin_role_id) ?>,
            });
        };

        function udpatePermissions(systemId)
        {
            let perms = $("input[name='"+systemId+"_perm_id[]']");

            if(perms.length>0)
            {
                permissions[systemId]=[];
                $(perms).each(function (pI, pElem) {

                    let perm_id = $(this).val();
                    if($(".perm_"+systemId+"_"+perm_id+"_checked").prop("checked"))
                    {
                        permissions[systemId].push(perm_id);
                    }
                });
            }

            console.log(permissions);
        }

        function onChangeModule(systemId, module, initial)
        {
            let groupElems = $("input[name='"+systemId+"_"+module+"_groups[]']");
            if($("input[name='"+systemId+"_"+module+"_checked']").prop("checked"))
            {
                if(groupElems.length>0)
                {
                    $(groupElems).each(function (index, gElem) {

                        let group = $(this).val();
                        $("input[name='"+systemId+"_"+module+"_"+group+"_checked']").prop("checked", true);

                        let permElems = $("input[name='"+systemId+"_"+module+"_"+group+"_permissions[]']");
                        if(permElems.length>0)
                        {
                            $(permElems).each(function (index, pElem) {

                                let perm = $(this).val();
                                $("input[name='"+systemId+"_"+module+"_"+group+"_"+perm+"_checked']").prop("checked", true);
                            });
                        }
                    });
                }
            }
            else
            {
                if(groupElems.length>0)
                {
                    $(groupElems).each(function (index, gElem) {

                        let group = $(this).val();
                        $("input[name='"+systemId+"_"+module+"_"+group+"_checked']").prop("checked", false);

                        let permElems = $("input[name='"+systemId+"_"+module+"_"+group+"_permissions[]']");
                        if(permElems.length>0)
                        {
                            $(permElems).each(function (index, pElem) {

                                let perm = $(this).val();
                                $("input[name='"+systemId+"_"+module+"_"+group+"_"+perm+"_checked']").prop("checked", false);
                            });
                        }
                    });
                }
            }

            if(!initial)
            {
                udpatePermissions(systemId);
            }
        }

        function onChangeGroup(systemId, module, group, initial)
        {
            if($("input[name='"+systemId+"_"+module+"_"+group+"_checked']").prop("checked"))
            {
                let permElems = $("input[name='"+systemId+"_"+module+"_"+group+"_permissions[]']");
                if(permElems.length>0)
                {
                    $(permElems).each(function (index, pElem) {

                        let perm = $(this).val();
                        $("input[name='"+systemId+"_"+module+"_"+group+"_"+perm+"_checked']").prop("checked", true);
                    });
                }
            }
            else
            {
                let permElems = $("input[name='"+systemId+"_"+module+"_"+group+"_permissions[]']");
                if(permElems.length>0)
                {
                    $(permElems).each(function (index, pElem) {

                        let perm = $(this).val();
                        $("input[name='"+systemId+"_"+module+"_"+group+"_"+perm+"_checked']").prop("checked", false);
                    });
                }
            }
            triggerModuleCheck(systemId, module);

            if(!initial)
            {
                udpatePermissions(systemId);
            }
        }

        function onChangePerm(systemId, module, group, initial)
        {
            triggerGroupCheck(systemId, module, group);

            if(!initial)
            {
                udpatePermissions(systemId);
            }
        }

        function triggerGroupCheck(systemId, module, group)
        {
            let groupChecked = true;

            let permElems = $("input[name='"+systemId+"_"+module+"_"+group+"_permissions[]']");
            if(permElems.length>0)
            {
                $(permElems).each(function (index, pElem) {

                    let perm = $(this).val();
                    if(!$("input[name='"+systemId+"_"+module+"_"+group+"_"+perm+"_checked']").prop("checked"))
                    {
                        groupChecked = false;
                    }
                });
            }

            $("input[name='"+systemId+"_"+module+"_"+group+"_checked']").prop("checked", groupChecked);
            triggerModuleCheck(systemId, module);
        }

        function triggerModuleCheck(systemId, module)
        {
            let moduleChecked = true;

            let groupElems = $("input[name='"+systemId+"_"+module+"_groups[]']");
            if(groupElems.length>0)
            {
                $(groupElems).each(function (index, gElem) {

                    let group = $(this).val();
                    if(!$("input[name='"+systemId+"_"+module+"_"+group+"_checked']").prop("checked"))
                    {
                        moduleChecked = false;
                    }
                });
            }

            $("input[name='"+systemId+"_"+module+"_checked']").prop("checked", moduleChecked);
        }

        function submitCreateForm()
        {
            $('#create_form').ajaxForm({
                url			: "<?php if(isset($formSubmitUrl)){ echo URL::to($formSubmitUrl); } ?>",
                type		: "POST",
                dataType	: "json",
                beforeSubmit: validateForm,
                success		: serverResponse,
                error		: onError
            });
        }

        function validateForm(formData, jqForm)
        {
            let perms = JSON.stringify(permissions);
            formData.push({permissions:perms});

            let form = jqForm[0];

            let errors=0;
            let errorText=[];

            let role_name=form.role_name.value;

            errorText.push("<strong> <span class='glyphicon glyphicon-warning-sign'></span> Following errors occurred while submitting the form</strong><br/>");

            if(role_name === "")
            {
                errors++;
                errorText.push('Administrator Role Name Required.');
            }

            if(errors > 0)
            {
                let errorData=[];
                errorData.status="warning";
                errorData.notify=errorText;

                showNotifications(errorData);

                return false;
            }
            else
            {
                //show preloader
                showPreloader($('#create_form'), true);

                //disable form submit
                $('#create_form button[type="submit"]').attr("disabled", "disabled");
                return true;
            }
        }

        function serverResponse(responseText)
        {
            //Hide preloader
            hidePreloader($('#create_form'));
            $('#create_form button[type="submit"]').removeAttr("disabled");

            <?php
            if($formMode === "add")
            {
            ?>
                if(responseText.notify.status && responseText.notify.status == "success")
                {
                    $("#create_form").trigger("reset");
                }
                <?php
            }
            ?>

            showNotifications(responseText.notify)
        }

        function onError()
        {
            //Hide preloader
            hidePreloader($("#create_form"));
            $('#create_form button[type="submit"]').removeAttr("disabled");

            let errorText=[];
            let errorData=[];

            errorText.push('Something went wrong. Please try again.');

            errorData.status="warning";
            errorData.notify=errorText;

            showNotifications(errorData)
        }
    </script>
@endsection

@section('page_css')
@endsection

@section('page_js')
@endsection
