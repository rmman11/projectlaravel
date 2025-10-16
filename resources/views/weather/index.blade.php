
          <div class="img_section">
            
          </div>
          <div class="content_section">
            <form  action="{{ route('weather.search') }}" method="post">
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
         
           
                </li>
                <li>
                 
                </li>
                <li>
                  
                </li>
                <li>
                 
                </li>
              </ul>
            </div>
          </div>

               