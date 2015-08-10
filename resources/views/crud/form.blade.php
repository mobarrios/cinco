@extends('index')

    @section('content')

        @if(isset($model))
            {!! Form::model($model)!!}
        @else
            {!! Form::open()!!}
        @endif

        {!! Form::text('name') !!}



        {!! Form::close()!!}

    @endsection

@stop