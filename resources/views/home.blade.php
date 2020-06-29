@extends('layouts.app')

@section('content')
            
@if(auth()->user()->isAdmin())


    <div class="row">


        <div class="col-md-2">

            <div class="card bg-info">

                <div class="card-header text-center">

                Posts

                </div>

                <div class="card-body text-center">

                    {{$post}}

                </div>


            </div>

        </div>

        <div class="col-md-2">

            <div class="card bg-primary">

                <div class="card-header text-center">

                    Users

                </div>

                <div class="card-body text-center">

                    {{$user}}

                </div>


            </div>

        </div>

        <div class="col-md-2">

            <div class="card bg-success">

                <div class="card-header text-center">

                Tags

                </div>

                <div class="card-body text-center">

                    {{$tag}}

                </div>


            </div>

        </div>

        <div class="col-md-2">

            <div class="card bg-warning">

                <div class="card-header text-center">

                Cats

                </div>

                <div class="card-body text-center">

                    {{$category}}

                </div>


            </div>

        </div>
        



    </div>


@else


    <h3 class="text-center">Welcome {{auth()->user()->name}}</h3>



@endif
     
@endsection
