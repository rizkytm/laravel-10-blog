@extends('new_features.layout')


@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2> Show New Feature</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('new-features.index') }}"> Back</a>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Title:</strong>

                {{ $new_feature->title }}

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Content:</strong>

                {{ $new_feature->content }}

            </div>

        </div>

    </div>

@endsection