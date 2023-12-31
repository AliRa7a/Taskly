<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('navbar')
    <main class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <table class="table table-striped mx-auto">
                    </table>
                    <h2 class="text-center mt-4">Update Task</h2>
                    <form method="POST" action="{{ route('tasks.update',$task->id) }}">
                        @csrf

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" value="{{$task->title}}" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{$task->description}}</textarea>
                        </div>


                        <div class="mb-3">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" value="{{$task->due_date}}" class="form-control" id="due_date" name="due_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" value="{{$task->priority}}" id="priority" name="priority" required>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
