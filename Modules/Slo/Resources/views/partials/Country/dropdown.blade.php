<select class="form-control " name="country" id="id">
    @foreach($countries as $country)
    <option value="{{$country->country_id}}">{{$country->country_name}}</option>
    @endforeach
</select>


