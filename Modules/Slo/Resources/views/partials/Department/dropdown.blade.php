<select class="form-control " name="dept_id" id="dept_id" required>
    <option>Select Department</option>
    @foreach($departments as $department)
    <option value="{{$department->dept_id}}">{{$department->dept_name}}</option>
    @endforeach
</select>

