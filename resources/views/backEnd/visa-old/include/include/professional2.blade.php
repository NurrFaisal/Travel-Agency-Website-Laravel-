{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-professional2">


    <div class="form-group">
        <label>Govtment Service</label>
        <textarea required id="professional2" name="professional2"  class="form-control"></textarea>
    </div>
    @if ($errors->has('professional2'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('professional2') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'professional2' );
</script>
