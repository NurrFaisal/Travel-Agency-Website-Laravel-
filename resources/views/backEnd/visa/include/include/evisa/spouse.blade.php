{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-spouse-evisa">


    <div class="form-group">
        <label>Spouse</label>
        <textarea id="spouse-evisa" name="spouse_evisa"  class="form-control"></textarea>
    </div>
    @if ($errors->has('spouse_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('spouse_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'spouse-evisa' );
</script>
