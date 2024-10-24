@extends('layouts.app')
@section('title', 'Sicredi')
@section('content')
<style>
    h2 {
        font-weight: bold;
        color: #4CAF50; /* Verde Sicredi */
    }
    .btn-outline-success {
        border-color: #4CAF50;
        color: #4CAF50;
    }
    .btn-outline-success:hover {
        background-color: #4CAF50;
        color: white;
    }
</style>

<div class="container-fluid">
    <div class="row align-items-center justify-content-center">
        <div class="col-md-6 text-center">
            <img src="https://media-exp1.licdn.com/dms/image/C4D22AQGhlJ2HyiWC5A/feedshare-shrink_2048_1536/0/1662140214534?e=2147483647&v=beta&t=Mw6Is4DCy9ZH-uI8q5hA6GjKa6Qp0zoI7ztyJWIe0ao" class="img-fluid" alt="Imagem Sicredi">
        </div>
        <div class="col-md-6 text-center d-flex flex-column justify-content-center">
            <h2 class="mb-4">Somos a melhor empresa para se trabalhar no Brasil</h2>
            <x-user-card :user="$user" />
        </div>
    </div>
</div>


@endsection