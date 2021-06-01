@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細</h1>
    
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $task->content }}</td>
        </tr>
    </table>

    {!! link_to_route('tasks.edit', 'Edit', ['task' => $task->id], ['class' => 'btn btn-secondary']) !!}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    {!! link_to_route('tasks.index', 'Back', [], ['class' => 'btn btn-secondary']) !!}
        
@endsection