{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane in active" id="bootstrap-professional-evisa_up_{{$visa->id}}">


    <div class="form-group">
        <label>Private Service</label>
        <textarea id="professional-evisa_{{$visa->id}}" name="professional_evisa"  class="form-control">@php echo $visa->professional_evisa @endphp</textarea>
    </div>
    @if ($errors->has('professional_evisa'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('professional_evisa') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'professional-evisa_{{$visa->id}}' );
</script>
