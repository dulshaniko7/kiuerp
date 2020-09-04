<select class="form-control " name="country" id="id">
    @foreach($countries as $country)
    <option value="{{$country->id}}">{{$country->name}}</option>
    @endforeach
</select>


