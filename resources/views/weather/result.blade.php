
@extends('layouts.app')
@section('content')


          <div class="img_section">
            <div class="default_info">
              <h2 class="default_day">{{ now()->format('l') }}</h2>
              <span class="default_date">{{ now()->format('Y-m-d') }}</span>
              <div class="icons">
                <img src="{{ $iconUrl }}" alt="" />
                <h2 class="weather_temp">{{ $temp }}°C</h2>
                <h3 class="cloudtxt">{{ $weatherDescription }}</h3>
              </div>
            </div>
          </div>
          <div class="content_section">
            <form action="#" method="post">
                @csrf
              <input type="text" placeholder="Enter a city" name="city" />
              <button type="submit">Search</button>
            </form>
            <div class="day_info">
              <div class="content">
                <p class="title">City</p>
                <span class="value">{{ $city }}</span>
              </div>
              <div class="content">
                <p class="title">Country Code</p>
                <span class="value">{{ $country }}</span>
              </div>
              <div class="content">
                <p class="title">TEMP</p>
                <span class="value">{{ $temp }}°C</span>
              </div>
              <div class="content">
                <p class="title">HUMIDITY</p>
                <span span class="value">{{ $humidity }}%</span>
              </div>
              <div class="content">
                <p class="title">WIND SPEED</p>
                <span class="value">{{ $wind }}Km/h</span>
              </div>
            </div>
            <div class="list_content">
              <ul>
                <li>
                  <img src="{{ $icon0Url }}" />
                  <span>{{ date("l", strtotime("+1 day")) }}</span>
                  <span class="day_temp">{{$day0Temp}}°C</span>
                </li>
                <li>
                  <img src="{{ $icon1Url }}" />
                  <span>{{ date("l", strtotime("+2 day")) }}</span>
                  <span class="day_temp">{{$day1Temp}}°C</span>
                </li>
                <li>
                  <img src="{{ $icon2Url }}" />
                  <span>{{ date("l", strtotime("+3 day")) }}</span>
                  <span class="day_temp">{{$day2Temp}}°C</span>
                </li>
                <li>
                  <img src="{{ $icon3Url }}" />
                  <span>{{ date("l", strtotime("+4 day")) }}</span>
                  <span class="day_temp">{{$day3Temp}}°C</span>
                </li>
              </ul>
            </div>
          </div>
       
      @endsection