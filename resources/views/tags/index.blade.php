@extends('layouts.app')


@section('content')

    <div class="d-flex justify-content-end mb-2">

    <a href="{{route('tags.create')}}" class="btn btn-outline-success float-right">Add Tags</a>

    </div>

    <div class="card card-default">

        <div class="card-header">Tags</div>

        <div class="card-body">

            @if($tags->count() > 0)


            <table class="table">


                <thead>


                    <th>Name</th>
                    <th>Post Count</th>
                    <th></th>


                </thead>


                <tbody>

                    
                    


                        @foreach($tags as $tag)

                        <tr>

                            <td>{{$tag->name}}</td>
                            <td>{{$tag->posts->count()}}</td>
                            <td><a href="{{route('tags.edit', $tag->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                            <button class="btn btn-outline-danger btn-sm" onclick = myfunc({{$tag->id}})>Delete</button></td>

                        </tr>
                        @endforeach


                   



                </tbody>


            </table>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="post" id ="myform">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                Are You Sure You Want To Delete?
                                </div>
                                <div class="modal-footer">
                                    <button type="button"  class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                    <button type ='submit' type="button" class="btn btn-outline-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>


            @else

                <h3 class="text-center">No Tags Yet</h3>

            @endif


        </div>



    </div>

@endsection 


@section('scripts')

<script>

    function myfunc(id){

        let form = document.getElementById('myform');
        form.action = '/tags/' + id;
        $('#exampleModal').modal('show');
    }

</script>


@endsection