@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category
                        {{--                        <a href="{{route('categories.create')}}" class="btn btn-success btn-sm float-right">Add New</a>--}}
                        <a href="#" data-toggle="modal" data-target="#categoryCreate"
                           class="btn btn-success btn-sm float-right">Add New</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="categories" class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 1)
                            @foreach($categories as $category)
{{--                                {{ $posts_count = $category->blog_posts_count}}--}}
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <a href="{{route('categories.status.update', $category->id)}}" class="text-dark"
                                           onclick="return confirm('Are you sure to change!!!')">
                                            {{$category->status == 1 ? 'Active' : 'Inactive'}}
                                        </a>
                                    </td>
                                    <td>
                                        {{--                                        <a href="{{route('categories.edit', $category->id)}}" class="btn btn-primary btn-sm">Edit</a>--}}
                                        <button type="button" onclick="openCategoryEditModal({{$category->id}})"
                                                class="btn btn-primary btn-sm">Edit
                                        </button>
                                        {{--                                        <a href="{{route('categories.show', $category->id)}}"--}}
                                        {{--                                           class="btn btn-info btn-sm">--}}
                                        {{--                                            View--}}
                                        {{--                                        </a>--}}
                                        <button type="button" onclick="openShowCategoryModal({{$category->id}})"
                                                class="btn btn-info btn-sm">
                                            View
                                        </button>

                                        {{Form::open(['route' => ['categories.destroy', $category->id], 'method'=>'DELETE', 'class' => 'd-inline'])}}
                                        <button type="submit"
                                                title="Delete"
                                                onclick="return confirm('Are you sure to delete!!!')"
                                                class="btn btn-sm btn-danger">Delete
                                        </button>
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        {{--                        {{$categories->links()}}--}}
                    </div>
                </div>
            </div>
        </div>

        <!-- Category Create Modal -->
        <div class="modal fade" id="categoryCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{Form::open(['route' => 'categories.store', 'method' => 'POST' ])}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                            <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

        <!-- Category Show Modal -->
        <div class="modal fade" id="categoryShowModal" tabindex="-1" aria-labelledby="categoryShowLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryShowLabel">Category Show</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-borderless">
                            <tbody>
                            <tr>
                                <th>Id:</th>
                                <td id="showCategoryId"></td>
                            </tr>
                            <tr>
                                <th>First Name:</th>
                                <td id="showCategoryName"></td>
                            </tr>
                            <tr>
                                <th>Last Name:</th>
                                <td id="showCategoryStatus"></td>
                            </tr>
                            <tr>
                                <th>Member Since:</th>
                                <td id="showCategoryCreatedAt"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category Edit Modal -->
        <div class="modal fade" id="categoryEditModal" tabindex="-1" aria-labelledby="categoryEditLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryEditLabel">Category Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{Form::open(['id' => 'categoryEditForm', 'method' => 'PUT' ])}}
                    {{--                    {{Form::open(['route' => ['categories.update', $category->id], 'method' => 'PUT' ])}}--}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editCategoryName">Category Name</label>
                            <input type="text" name="name" class="form-control" id="editCategoryName">
                            <span class="text-danger ">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                        <div class="form-group ">

                            <label class="d-block">Status</label>

                            <label for="editCategoryStatusActive" class="mr-4">
                                <input class="" type="radio" name="status" id="editCategoryStatusActive" value="1"
                                       checked> Active
                            </label>
                            <label for="editCategoryStatusInactive">
                                <input class="" type="radio" name="status" id="editCategoryStatusInactive" value="0">
                                Inactive
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                        <button type="button" class="btn btn-sm btn-sm btn-secondary" data-dismiss="modal">Close
                        </button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        let categories = @json($categories)

            // functions
            function openShowCategoryModal(id) {

                let category = categories.data.find(catetory => catetory.id == id)

                // console.log(category);

                $('#showCategoryId').html(category.id);
                $('#showCategoryName').html(category.name);
                $('#showCategoryStatus').html(category.status == 1 ? 'Active' : 'Inactive');
                $('#showCategoryCreatedAt').html(category.created_at);

                // Open modal
                $('#categoryShowModal').modal('show');
            }

        function openCategoryEditModal(id) {
            // Find category
            let category = categories.data.find(category => category.id == id)

            // Catch app Url
            const appUrl = $('meta[name="app-url"]').attr('content');

            // Dynamic edit form action attribute
            $('#categoryEditForm').attr('action', appUrl + '/categories/' + category.id);

            // console.log(app_url);
            $('#editCategoryName').val(category.name);

            // short form
            // category.status == 1 ? $('#editCategoryStatusActive').prop( "checked", true ) : $('#editCategoryStatusInactive').prop( "checked", true );
            //alternative
            if (category.status == 1) {
                $('#editCategoryStatusActive').prop("checked", true)
            } else {
                $('#editCategoryStatusInactive').prop("checked", true)
            }


            // Open modal
            $('#categoryEditModal').modal('show');
        }


        $(document).ready(function () {
            $('#categories').DataTable({
                "columnDefs": [
                    {"orderable": false, "targets": [1, 2]}
                ]
            });
        });
    </script>
@endsection
