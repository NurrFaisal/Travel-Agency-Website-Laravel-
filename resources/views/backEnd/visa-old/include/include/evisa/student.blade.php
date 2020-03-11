{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-student-evisa">


    <div class="form-group">
        <label>Student</label>
        <textarea id="student-evisa" name="student_evisa"  class="form-control"></textarea>
    </div>
    @if ($errors->has('student_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('student_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'student-evisa' );
</script>
