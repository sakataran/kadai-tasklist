@extends('layouts.app')

@section('content')

        <h1>タスク追加</h1>
        
        <div class="row">
            <div class="col-6">
                {!! Form::model($task, ['route' => 'tasks.store']) !!}
    
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス:') !!}
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('content', 'タスク:') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    </div>
    
                    {!! Form::submit('Add', ['class' => 'btn btn-secondary']) !!}
    
                {!! Form::close() !!}
            </div>
        </div>

@endsection