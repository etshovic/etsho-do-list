@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <h4 class="task-head">Task with ID => {{ $task->id }}</h4>
                <table class="table table-hover table-bordered">
                    <tr>
                        <td>Task</td>
                        <td>Created At</td>
                        <td>Options</td>
                    </tr>
                    <tr>
                        <td>{{ $task->task }}</td>
                        <td>{{ $task->created_at }}</td>
                        <td>
                            <a href="{{ url($task->id . '/complete') }}" class="btn btn-sm btn-warning">Completed</a>
                            <a href="{{ url($task->id . '/delete') }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection