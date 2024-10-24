@extends('layouts.app')
@section('title', 'Detalhes do Usuário')
@section('content')

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
    <x-user-card :user="$user" />
</div>

@endsection