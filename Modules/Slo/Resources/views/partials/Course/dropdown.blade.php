<select class="form-control " name="course_id" id="course_id" required>
    <option>Select Course</option>
    @foreach($courses as $course)
    <option value="{{$course->course_id}}">{{$course->course_name}}</option>
    @endforeach
</select>
