@extends('layouts.app')

@section('content')
    @livewire('category-management')
@endsection

@push('js')
    @livewireScripts
@endpush
