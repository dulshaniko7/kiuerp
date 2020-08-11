@extends('admin::layouts.master')

@section('page_content')
    <form action="javascript:;" id="create_form">
        @csrf
        <div class="row">
            <div class="col-md-12 text-md">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="header-title"><?php echo $permissionSystem["system_name"]; ?> | Import Permissions</h4>
                                <input type="hidden" name="admin_perm_system_id" value="<?php echo $permissionSystem["admin_perm_system_id"]; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-muted">You can import permissions which has been prepared by developer, through this import window.</p>

                                <?php
                                if(is_array($systemPermissions) && count($systemPermissions)>0)
                                {
                                    foreach ($systemPermissions as $modKey => $module)
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
                                                        <input type="hidden" name="modules[]" value="<?php echo $modKey; ?>">
                                                        <input type="hidden" name="<?php echo $modKey; ?>_module_slug" value="<?php echo $modSlug; ?>">
                                                        <input type="hidden" name="<?php echo $modKey; ?>_module_id" value="<?php echo $moduleId; ?>">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <p class="text-muted">Permission Module</p>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                            <input type="checkbox" name="<?php echo $modKey; ?>_checked" value="1" onchange="return onChangeModule(<?php echo $modKey; ?>);">
                                                                        </span>
                                                                    </div>
                                                                    <input type="text" name="<?php echo $modKey; ?>_module_name" value="<?php echo $modName; ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="text-muted">Module Slug</p>
                                                                <input type="text" value="<?php echo $modSlug; ?>" class="form-control" readonly>
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
                                                                    <input type="hidden" name="<?php echo $modKey; ?>_groups[]" value="<?php echo $groupKey; ?>">
                                                                    <input type="hidden" name="<?php echo $modKey."_".$groupKey; ?>_group_slug" value="<?php echo $groupSlug; ?>">
                                                                    <input type="hidden" name="<?php echo $modKey."_".$groupKey; ?>_group_id" value="<?php echo $groupId; ?>">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <p class="text-muted">Permission Module Group</p>
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">
                                                                                        <input type="checkbox" name="<?php echo $modKey."_".$groupKey; ?>_checked" value="1" onchange="return onChangeGroup(<?php echo $modKey; ?>, <?php echo $groupKey; ?>);">
                                                                                    </span>
                                                                                </div>
                                                                                <input type="text" name="<?php echo $modKey."_".$groupKey; ?>_group_name" value="<?php echo $groupName; ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <p class="text-muted">Module Group Slug</p>
                                                                            <input type="text" value="<?php echo $groupSlug; ?>" class="form-control" readonly>
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
                                                                                ?>
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <input type="hidden" name="<?php echo $modKey."_".$groupKey; ?>_permissions[]" value="<?php echo $permKey; ?>">
                                                                                        <div class="input-group mb-3">
                                                                                            <div class="input-group-prepend">
                                                                                                <span class="input-group-text">
                                                                                                    <input type="checkbox" name="<?php echo $modKey."_".$groupKey."_".$permKey; ?>_checked" value="1" onchange="return onChangePerm(<?php echo $modKey; ?>, <?php echo $groupKey; ?>);">
                                                                                                </span>
                                                                                            </div>
                                                                                            <input type="text" value="<?php echo $permName; ?>" name="<?php echo $modKey."_".$groupKey."_".$permKey; ?>_permission_title" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <input type="text" value="<?php echo $action; ?>" name="<?php echo $modKey."_".$groupKey."_".$permKey; ?>_permission_action" class="form-control" readonly>
                                                                                        <input type="hidden" value="<?php echo $hash; ?>"  name="<?php echo $modKey."_".$groupKey."_".$permKey; ?>_permission_key">
                                                                                        <input type="hidden" value="<?php echo $permId; ?>"  name="<?php echo $modKey."_".$groupKey."_".$permKey; ?>_perm_id">
                                                                                    </div>
                                                                                </div>
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
                                else
                                {
                                    ?>
                                    <p>Currently there are no pending permissions to import to the system.</p>
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
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-add-row">Import Permissions</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        window.onload = function()
        {
            submitCreateForm();
        };

        function onChangeModule(module)
        {
            let groupElems = $("input[name='"+module+"_groups[]']");
            if($("input[name='"+module+"_checked']").prop("checked"))
            {
                if(groupElems.length>0)
                {
                    $(groupElems).each(function (index, gElem) {

                        let group = $(this).val();
                        $("input[name='"+module+"_"+group+"_checked']").prop("checked", true);

                        let permElems = $("input[name='"+module+"_"+group+"_permissions[]']");
                        if(permElems.length>0)
                        {
                            $(permElems).each(function (index, pElem) {

                                let perm = $(this).val();
                                $("input[name='"+module+"_"+group+"_"+perm+"_checked']").prop("checked", true);
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
                        $("input[name='"+module+"_"+group+"_checked']").prop("checked", false);

                        let permElems = $("input[name='"+module+"_"+group+"_permissions[]']");
                        if(permElems.length>0)
                        {
                            $(permElems).each(function (index, pElem) {

                                let perm = $(this).val();
                                $("input[name='"+module+"_"+group+"_"+perm+"_checked']").prop("checked", false);
                            });
                        }
                    });
                }
            }
        }

        function onChangeGroup(module, group)
        {
            if($("input[name='"+module+"_"+group+"_checked']").prop("checked"))
            {
                let permElems = $("input[name='"+module+"_"+group+"_permissions[]']");
                if(permElems.length>0)
                {
                    $(permElems).each(function (index, pElem) {

                        let perm = $(this).val();
                        $("input[name='"+module+"_"+group+"_"+perm+"_checked']").prop("checked", true);
                    });
                }
            }
            else
            {
                let permElems = $("input[name='"+module+"_"+group+"_permissions[]']");
                if(permElems.length>0)
                {
                    $(permElems).each(function (index, pElem) {

                        let perm = $(this).val();
                        $("input[name='"+module+"_"+group+"_"+perm+"_checked']").prop("checked", false);
                    });
                }
            }
            triggerModuleCheck(module);
        }

        function onChangePerm(module, group)
        {
            triggerGroupCheck(module, group);
        }

        function triggerGroupCheck(module, group)
        {
            let groupChecked = true;

            let permElems = $("input[name='"+module+"_"+group+"_permissions[]']");
            if(permElems.length>0)
            {
                $(permElems).each(function (index, pElem) {

                    let perm = $(this).val();
                    if(!$("input[name='"+module+"_"+group+"_"+perm+"_checked']").prop("checked"))
                    {
                        groupChecked = false;
                    }
                });
            }

            $("input[name='"+module+"_"+group+"_checked']").prop("checked", groupChecked);
            triggerModuleCheck(module);
        }

        function triggerModuleCheck(module)
        {
            let moduleChecked = true;

            let groupElems = $("input[name='"+module+"_groups[]']");
            if(groupElems.length>0)
            {
                $(groupElems).each(function (index, gElem) {

                    let group = $(this).val();
                    if(!$("input[name='"+module+"_"+group+"_checked']").prop("checked"))
                    {
                        moduleChecked = false;
                    }
                });
            }

            $("input[name='"+module+"_checked']").prop("checked", moduleChecked);
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
            let form = jqForm[0];

            let errors=0;
            let errorText=[];

            errorText.push("<strong> <span class='glyphicon glyphicon-warning-sign'></span> Following errors occurred while submitting the form</strong><br/>");

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
