{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-professional2-evisa">


    <div class="form-group">
        <label>Govtment Service</label>
        <textarea id="professional2-evisa" name="professional2_evisa"  class="form-control"></textarea>
    </div>
    @if ($errors->has('professional2_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('professional2_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'professional2-evisa' );
</script>
