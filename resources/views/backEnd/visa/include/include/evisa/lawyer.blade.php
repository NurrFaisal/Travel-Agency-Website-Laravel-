{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-lawyer-evisa">


    <div class="form-group">
        <label>Lawyer</label>
        <textarea id="lawyer-evisa" name="lawyer_evisa"  class="form-control"></textarea>
    </div>
    @if ($errors->has('lawyer_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('lawyer_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'lawyer-evisa' );
</script>
