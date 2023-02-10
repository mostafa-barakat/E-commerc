<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel ">
            <div class="content-wrapper">
                <div class="text-center">
                    @if (session('message'))
                        <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                            {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        </div>
                    @endif
                </div>
                <h2 class="mb-5 text-center">Add Catagory</h2>
                <form class="text-center mb-5" action="{{ route('admin.add_catagory_data') }}" method="POST">
                    @csrf
                    <input class="text-primary" type="text" name="name" id=""
                        placeholder="Write new catagory">
                    <button class="btn btn-primary ">send</button>
                </form>
                <table class="table table-bordered border-primary w-50 m-auto">
                    <thead class="table-light">
                        <tr class="text-primary">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ( $catagorys as $catagory)
                            <tr>
                                <td>{{ $catagory->id }}</td>
                                <td>{{ $catagory->name }}</td>
                                <th>
                                    {{-- <a href="{{ route('project.edit', $catagory->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> --}}
                                    <form class="d-inline" action="{{ route('admin.destroy', $catagory->id) }}"method="post">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Are you sure?!')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </th>
                            </tr>
                            @empty
                            <td colspan="3" class="text-center text-primary">EMPTY</td>
                            @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
</body>

</html>
