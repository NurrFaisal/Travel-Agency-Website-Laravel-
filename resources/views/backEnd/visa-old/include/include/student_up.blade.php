{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-student_up_{{$visa->id}}">


    <div class="form-group">
        <label>Student</label>
        <textarea required id="student_{{$visa->id}}" name="student"  class="form-control">@php echo $visa->student @endphp</textarea>
    </div>
    @if ($errors->has('student'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('student') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'student_{{$visa->id}}' );
</script>
