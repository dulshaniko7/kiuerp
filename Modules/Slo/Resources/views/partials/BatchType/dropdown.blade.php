<select class="form-control " name="batch_type" id="batch_type" required>
    <option>Select Batch Type</option>
    @foreach($batchTypes as $type)
    <option value="{{$type->batch_type}}">{{$type->description}}</option>
    @endforeach
</select>
