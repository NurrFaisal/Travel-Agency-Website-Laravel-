{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-spouse_up_{{$visa->id}}">


    <div class="form-group">
        <label>Spouse</label>
        <textarea required spouse id="spouse_{{$visa->id}}" name="spouse"  class="form-control">@php echo $visa->spouse @endphp</textarea>
    </div>
    @if ($errors->has('spouse'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('spouse') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'spouse_{{$visa->id}}' );
</script>
