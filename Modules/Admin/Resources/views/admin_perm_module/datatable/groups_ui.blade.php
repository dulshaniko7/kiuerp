var id = full["id"];

var uiText = '<div class="clearfix text-center">';
        uiText += '<a href="<?php echo $groupUrl; ?>/'+id+'" class="text-white">';
            uiText += '<div class="btn btn-info">Permission Groups</div>';
        uiText += "</a>";
    uiText += '</div>';

return uiText;
