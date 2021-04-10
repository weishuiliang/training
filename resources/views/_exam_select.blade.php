<form action="./{{$url}}" method="get">
    <div class="" style="margin: 0 auto;width: 400px;">
        <label >切换试卷</label>
        <select name="exam_id" class="form-control" style="width: 200px;display: inline;">
            @foreach($exam_select as $val)
                <option value="{{$val['exam_id']}}"
                @if($current_exam_id == $val['exam_id'])
                    <?php echo "selected";?>
                        @endif
                >
                    {{$val['exam_name']}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">提交</button>
    </div>
</form>