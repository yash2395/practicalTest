<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="text-center mb-4">Employee List</h1>

                @if (@session('success'))
                    <div class="alert alert-success">
                        {{ session ('success')}}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Gender</th>
                                <th>Hobby</th>
                                <th>Address</th>
                                <th>Photo</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$employee->first_name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->mobile}}</td>
                                    <td>{{$employee->gender}}</td>
                                    <td>{{$employee->hobby}}</td>
                                    <td>{{$employee->address}}</td>
                                    <td>
                                        @if ($employee->photo)
                                            <img src="{{asset('storage/' . $employee->photo)}}" alt="Photo" width="50" height="50" class="rounded-circle">
                                        @else
                                            No Photo
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('employee.edit',$employee->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{route('employee.destroy', $employee->id)}}" method="post" style="display: inline-block">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <button type="sumbit" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No Employee Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{route('employee.create')}}" class="btn btn-primary mt-3">Add New Employee</a>
            </div>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
