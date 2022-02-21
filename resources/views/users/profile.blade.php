@extends('layouts.admin')
@section('title', "Mon Profil")
@php
    $user = $_user;
    $collaborateur = $user->collaborateur;    
@endphp

@section('content')
    {{-- Contenu de la page --}}
    @include('admin.users.fiche')
@endsection