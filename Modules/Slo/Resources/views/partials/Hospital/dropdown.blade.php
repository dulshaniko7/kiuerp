<select class="form-control " name="hospital_id" id="hospital_id" required>
    <option>Select Hospital</option>
    @foreach($hospitals as $h)
    <option value="{{$h->gen_hospital_id}}">{{$h->hospital_name}}</option>
    @endforeach
</select>
