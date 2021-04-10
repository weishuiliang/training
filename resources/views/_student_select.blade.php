<form action="./{{$url}}" method="get">
    <div class="page-header" style="margin: 0 auto;width: 400px;">
        <label>切换学生</label>
        <select name="student_id" style="width: 200px;display: inline;" class="form-control">
            @foreach($student_select as $key => $val)
                <option value="{{$key}}"
                @if($current_student_id == $key)
                    <?php echo "selected"; ?>
                        @endif
                >{{$val}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">提交</button>
    </div>
</form>