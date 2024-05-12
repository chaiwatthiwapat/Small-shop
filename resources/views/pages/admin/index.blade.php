@extends('components.layouts.admin-app')
@section('content')

<div class="alert alert-primary">{{ Auth::check() ? Auth::user()->usertype : '' }}</div>

index



@endsection
