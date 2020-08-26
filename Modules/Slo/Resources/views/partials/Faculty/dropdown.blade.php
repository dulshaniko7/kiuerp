<select class="form-control " name="faculty_id" id="faculty_id" required>
    <option>Select Faculty</option>
    @foreach($faculties as $faculty)
    <option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
    @endforeach
</select>
