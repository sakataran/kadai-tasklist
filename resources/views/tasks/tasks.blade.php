    <h1>タスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステータス</th>
                    <th>タスク</th>
                    <th>作成日時</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- ページネーションのリンク --}}
        {{ $tasks->links() }}
    @endif
    
    {!! link_to_route('tasks.create', 'Add', [], ['class' => 'btn btn-secondary']) !!}