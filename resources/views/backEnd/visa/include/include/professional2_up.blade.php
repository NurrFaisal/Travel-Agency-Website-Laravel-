{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-professional2_up_{{$visa->id}}">


    <div class="form-group">
        <label>Govt Service</label>
        <textarea required id="professional2_{{$visa->id}}" name="professional2"  class="form-control">@php echo $visa->professional2 @endphp</textarea>
    </div>
    @if ($errors->has('professional2'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('professional2') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'professional2_{{$visa->id}}' );
</script>
