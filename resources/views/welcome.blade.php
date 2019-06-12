@extends("layouts.app")
@section("content")
    <div class="container">
        @if(session()->has('message'))
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <div class="alert alert-success" role="alert">
                    <strong>Done !!! </strong>
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>      
        @endif
        <div class="row">
            <div class="col-md-6 col-md-push-3">
                <h1>Todo List</h1>
                <form method="POST" action={{url('/task')}}>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" name="task" placeholder="Enter Task">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if(!$tasks->all() && !$comp_tasks->all())
                <div class="row">
                    <div class="col-md-6 col-md-push-3">
                        <h4 class="task-head-red">NO Tasks</h4>
                        <div class="alert alert-danger">COME ON!!!! There are no any Tasks YET</div>
                    </div>
                </div>
            @else
                <div class="col-md-6">
                    @if($tasks->all())
                        <h4 class="task-head-red">All Tasks</h4>
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>Task</td>
                                <td>Options</td>
                            </tr>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>
                                        <a href="{{ url($task->id . '/show') }}">
                                            {{ $task->task }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url($task->id . '/complete') }}" class="btn btn-sm btn-warning">Completed</a>
                                        <a href="{{ url($task->id . '/delete') }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h4 class="task-head-green">All Tasks</h4>
                        <div class="alert alert-success">HOORRRRRRRRAY!!!! ALL Tasks Are Completed , PERFECT !!!</div>
                    @endif
                </div>
                <div class="col-md-6">
                    @if($comp_tasks->all())
                        <h4 class="task-head-green">Completed Tasks</h4>
                        <table class="table table-hover table-bordered">
                            <tr>
                                <td>Task</td>
                                <td>Options</td>
                            </tr>
                            @foreach($comp_tasks as $c_task)
                                <tr>
                                    <td>
                                        <a href="{{ url($c_task->id . '/show') }}">
                                            {{ $c_task->task }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ url($c_task->id . '/incomplete') }}" class="btn btn-sm btn-primary">Incomplete</a>
                                        <a href="{{ url($c_task->id . '/delete') }}" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @else
                        <h4 class="task-head-red">Completed Tasks</h4>
                        <div class="alert alert-danger">COME ON!!!! There are no any COMPLETED Tasks</div>
                    @endif
                </div>
            @endif
        </div>
    </div>
@endsection