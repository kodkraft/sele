<?php
/**@var \App\Models\Admin\Setting[]|\Illuminate\Support\Collection $settings */

?>
@extends('layouts.app',['title'=>'Settings'])
@section('content')
    <table>
        <tbody>
        @foreach($settings as $setting)
            <tr>
                <th>{{$setting->name}}</th>
                <td>{{$setting->value}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('js')
    @livewireScripts
@endpush
