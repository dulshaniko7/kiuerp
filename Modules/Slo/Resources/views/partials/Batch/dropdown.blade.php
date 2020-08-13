<select class="form-control " name=batch_id" id="batch_id" required>
    <option>Select Batch</option>
    @foreach($batches as $batch)
    <option value="{{$batch->batch_id}}">{{$batch->batch_name}}</option>
    @endforeach
</select>


