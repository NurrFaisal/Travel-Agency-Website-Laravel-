{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-child-evisa">


    <div class="form-group">
        <label>Child</label>
        <textarea id="child-evisa" name="child_evisa"  class="form-control"></textarea>
    </div>
    @if ($errors->has('child_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('child_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'child-evisa' );
</script>
