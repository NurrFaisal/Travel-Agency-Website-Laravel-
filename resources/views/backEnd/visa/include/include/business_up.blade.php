{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-business_up_{{$visa->id}}">


    <div class="form-group">
        <label>Business</label>
        <textarea required id="business_{{$visa->id}}" name="business"  class="form-control">@php echo $visa->business @endphp</textarea>
    </div>
    @if ($errors->has('business'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('business') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'business_{{$visa->id}}' );
</script>
