@extends('layout')

@section('content')

    <h1 class="title">Create a New Project</h1>

    <form method="POST" action="/projects">
        {{ csrf_field() }}
        <div class="field">
            <label for="title" class="Label">Title</label>
            <div class="control">
                <input type="text" class="input {{$errors->has('title') ? 'is-danger' : ''}}" name="title" placeholder="Title" value="{{old('title')}}">
            </div>
        </div>
        <div class="field">
            <label for="title" class="Label">Description</label>
            <div class="control">
                <textarea name="description" class="textarea{{$errors->has('title') ? 'is-danger' : ''}}" value="{{old('description')}}"></textarea>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">Update Project</button>
                </div>
            </div>

        </div>

        @include('errors')
    </form>
@endsection