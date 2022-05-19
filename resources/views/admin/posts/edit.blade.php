@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Post</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

<div class="card">
    <div class="card-body">
        {!! Form::model($post, ['route'=>['admin.posts.update', $post],'autocomplete'=>'off', 'files'=>true, 'method' =>'PUT']) !!}

        @include('admin.posts.partials.form')

        {!! form::submit('Actualizar Post', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
    </div>
</div>

@stop

@section('css')
    <style>
        .image-wrapper img{
            position: relative;
            padding-bottom: 50.25%;

        }
        .image-wrappe img{
            position: absolute;
            object-fit: cover;
            width: 50%;
            height:50%;
        }
    </style>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
        });
    });

    ClassicEditor
    .create( document.querySelector( '#extract' ))
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
    .create( document.querySelector( '#body' ))
    .catch( error => {
        console.error( error );
    } );

     //cambiar imagen
    document.getElementById("file").addEventListener('change',cambiarImagen);

    function cambiarImagen(event){
        var file = event.target.files[0];

        var reader = new FileReader();
        reader.onload =(event)=>{
            document.getElementById("picture").setAttribute('src', event.target.result);

        };

        reader.readAsDataURL(file);
    }

</script>
@endsection

