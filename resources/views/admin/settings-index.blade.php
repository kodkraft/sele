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
                <td>
                    <form method="post"
                          action="{{action([\App\Http\Controllers\Admin\SettingController::class,'update'],['setting'=>$setting->id])}}">
                        <input type="text" name="value" value="{{$setting->value}}" required> @csrf @method('patch')
                        <button type="submit">@lang('common.save')</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@push('js')
    @livewireScripts
@endpush
