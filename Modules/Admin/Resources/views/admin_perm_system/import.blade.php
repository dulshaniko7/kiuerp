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
                                <h4 class="header-title"><?php echo $systemName; ?> | Import Permissions</h4>
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
                                        $groups = $module["groups"];
                                        ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="checkbox" name="permission[]" class="pull-left mr-3">

                                                        <?php echo $module["name"]; ?>
                                                    </div>
                                                </div>
                                                <hr>

                                                <?php
                                                if(is_array($groups) && count($groups)>0)
                                                {
                                                    foreach ($groups as $groupKey => $group)
                                                    {
                                                        $permissions = $group["permissions"];
                                                        ?>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="col-md-12">
                                                                    <input type="checkbox" name="permission[]" class="pull-left mr-3">

                                                                    <?php echo $group["name"]; ?>
                                                                </div>
                                                                <hr>

                                                                <?php
                                                                if(is_array($permissions) && count($permissions)>0)
                                                                {
                                                                    foreach ($permissions as $permKey => $permission)
                                                                    {
                                                                        ?>
                                                                        <div class="row">
                                                                            <div class="col-md-7">
                                                                                <input type="checkbox" name="permission[]" class="pull-left mr-3">

                                                                                <div class="pull-left">
                                                                                    <input type="text" value="<?php echo $permission["label"]; ?>" name="permission_title" class="form-control" readonly>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <input type="text" value="<?php echo $permission["action"]; ?>" name="permission_action" class="form-control" readonly>
                                                                                <input type="hidden" value="<?php echo $permission["hash"]; ?>"  name="permission_key">
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
