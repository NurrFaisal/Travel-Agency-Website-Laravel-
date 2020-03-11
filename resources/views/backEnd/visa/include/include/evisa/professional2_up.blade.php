{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-professional2-evisa_up_{{$visa->id}}">


    <div class="form-group">
        <label>Govt Service</label>
        <textarea id="professional2-evisa_{{$visa->id}}" name="professional2_evisa"  class="form-control">@php echo $visa->professional2_evisa @endphp</textarea>
    </div>
    @if ($errors->has('professional2_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('professional2_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'professional2-evisa_{{$visa->id}}' );
</script>
