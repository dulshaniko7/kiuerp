var country = full["country"];

var uiText = '<div class="clearfix">';

    if(country !== null)
    {
        uiText += country.country_name;
    }
    uiText += '</div>';

return uiText;
