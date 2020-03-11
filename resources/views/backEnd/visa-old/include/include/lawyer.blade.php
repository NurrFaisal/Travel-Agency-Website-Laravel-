{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-lawyer">


    <div class="form-group">
        <label>Lawyer</label>
        <textarea required id="lawyer" name="lawyer"  class="form-control"></textarea>
    </div>
    @if ($errors->has('lawyer'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('lawyer') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'lawyer' );
</script>
