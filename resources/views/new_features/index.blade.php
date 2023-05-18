@extends('new_features.layout')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>New Features</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('new-features.create') }}"> Create New Feature</a>

            </div>

        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif


    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Title</th>

            <th>Content</th>

            <th width="280px">Action</th>

        </tr>

	    @foreach ($new_features as $new_feat)

	    <tr>

	        <td>{{ ++$i }}</td>

	        <td>{{ $new_feat->title }}</td>

	        <td>{!! $new_feat->content !!}</td>

	        <td>

                <form action="{{ route('new-features.destroy',$new_feat->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('new-features.show',$new_feat->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('new-features.edit',$new_feat->id) }}">Edit</a>

                    @csrf

                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                </form>

	        </td>

	    </tr>

	    @endforeach

    </table>


@endsection