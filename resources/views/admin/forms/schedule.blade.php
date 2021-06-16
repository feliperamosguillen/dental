@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    
    @include('partials.admin.form.dropdown', ['attribute' => 'doctor_id', 'options' => $doctors])
    @include('partials.admin.form.dropdown', ['attribute' => 'patient_id', 'options' => $patients ])
    @include('partials.admin.form.text', ['attribute' => 'selected_date', 'class' => 'datepicker'])
    @include('partials.admin.form.text', ['attribute' => 'selected_hour'])

    @include('partials.admin.form.submit')
@endsection