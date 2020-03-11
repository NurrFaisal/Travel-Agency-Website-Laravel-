{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane in active" id="bootstrap-professional_up_{{$visa->id}}">


    <div class="form-group">
        <label>Private Service</label>
        <textarea required id="professional_{{$visa->id}}" name="professional"  class="form-control">@php echo $visa->professional @endphp</textarea>
    </div>
    @if ($errors->has('professional'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('professional') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'professional_{{$visa->id}}' );
</script>
