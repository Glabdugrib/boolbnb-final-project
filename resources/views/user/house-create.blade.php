@extends('layouts.app')

@section('content')
    Pagina create house:

    @php
    $id = Auth::id();
    @endphp

    {{-- RISOLVERE PROBLEMA POSITION ID --}}

    <div class="container">

        {{-- FORM PER POSITION --}}
        <form class="py-5" action="{{ route('user.position.store') }}" method="post">
            @csrf
            {{-- address --}}
            <div class="form-group">
                <label for="address">House address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Insert house address"
                    value="{{ old('address') }}">
            </div>
            {{-- city --}}
            <div class="form-group">
                <label for="city">House city</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="Insert house city"
                    value="{{ old('city') }}">
            </div>
            {{-- country --}}
            <div class="form-group">
                <label for="country">House country</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Insert house country"
                    value="{{ old('country') }}">
            </div>
            {{-- zip code --}}
            <div class="form-group">
                <label for="zip_code">Zip Code</label>
                <input type="number" class="form-control" name="zip_code" id="zip_code" value="{{ old('zip_code') }}">
            </div>


            {{-- create btn --}}
            <button class="btn btn-primary" type="submit">
                Confirm house position
            </button>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>




        {{-- FORM PER HOUSE --}}
        <form action="{{ route('user.houses.store') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" id="user_id" value="{{ $id }}">
            {{-- title --}}

            <div class="form-group">
                <label for="title">House title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Insert House title"
                    value="{{ old('title') }}">
            </div>

            {{-- rooms --}}
            <div class="form-group">
                <label for="room_num">Rooms Number</label>
                <input type="number" class="form-control" name="room_num" id="room_num" value="{{ old('room_num') }}">
            </div>

            {{-- beds --}}
            <div class="form-group">
                <label for="beds_num">Beds Number</label>
                <input type="number" class="form-control" name="beds_num" id="beds_num" value="{{ old('beds_num') }}">
            </div>

            {{-- toilets --}}
            <div class="form-group">
                <label for="toilets_num">Toilets Number</label>
                <input type="number" class="form-control" name="toilets_num" id="toilets_num"
                    value="{{ old('toilets_num') }}">
            </div>

            {{-- square meters --}}
            <div class="form-group">
                <label for="square_meters">Square Meters</label>
                <input type="number" class="form-control" name="square_meters" id="square_meters"
                    value="{{ old('square_meters') }}">
            </div>

            {{-- position???? --}}
            ------------>Temporaneamente position id è un campo del form<----------- <div class="form-group">
                <label for="position_id">Position id</label>
                <input type="number" class="form-control" name="position_id" id="position_id"
                    value="{{ old('position_id') }}">
    </div>

    {{-- image --}}

    <div class="form-group">
        <label for="image">House image</label>
        <input type="text" class="form-control" name="image" id="image" placeholder="Insert House image url"
            value="{{ old('image') }}">
    </div>

    {{-- cost per night --}}

    <div class="form-group">
        <label for="cost_per_night">Cost per night</label>
        <input type="number" class="form-control" name="cost_per_night" id="cost_per_night"
            value="{{ old('cost_per_night') }}">
    </div>


    {{-- services --}}
    <label>Services</label>
    <div class="d-flex" style="gap: 1rem;">
        @foreach ($services as $service)
            <div class="form-group form-check">
                <input type="checkbox" {{ $house->services->contains($service) ? 'checked' : '' }}
                    class="form-check-input" value="{{ $service->id }}" name="services[]"
                    id="services-{{ $service->id }}">
                <label class="form-check-label" for="services-{{ $service->id }}">{{ $service->name }}</label>
            </div>
        @endforeach
    </div>
    @error('services.*')
        <div class="text-danger">'The selected service is invalid</div>
    @enderror



    {{-- create btn --}}
    <button class="btn btn-primary" type="submit">
        Create
    </button>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    </form>
    </div>
@endsection
