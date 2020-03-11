{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/ckeditor.js"></script>--}}
{{--<script src="{{asset('backEnd/assets/ckeditor/')}}/samples/js/sample.js"></script>--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/css/samples.css">--}}
{{--<link rel="stylesheet" href="{{asset('backEnd/assets/ckeditor/')}}/samples/toolbarconfigurator/lib/codemirror/neo.css">--}}


<div role="tablist" class="tab-pane" id="bootstrap-child_up_{{$visa->id}}">


    <div class="form-group">
        <label>Child</label>
        <textarea required id="child_{{$visa->id}}" name="child"  class="form-control">@php echo $visa->child @endphp</textarea>
    </div>
    @if ($errors->has('child'))
        <span class="invalid-feedback" role="alert">
            <strong style="color: red">{{ $errors->first('child') }}</strong>
        </span>
    @endif
</div>

<script>
    CKEDITOR.replace( 'child_{{$visa->id}}' );
</script>
