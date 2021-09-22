@extends('layouts.app')
@section('content')
    <label>kategori isimleri</label>
    <select>
        <option disabled selected>Please select</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->title}}</option>
        @endforeach
    </select>
@endsection
