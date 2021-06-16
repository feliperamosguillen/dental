@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    
    @include('partials.admin.form.file', ['attribute' => 'picture'])

    @foreach (['name', 'lastname', 'ages'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach

    @include('partials.admin.form.submit')
@endsection
