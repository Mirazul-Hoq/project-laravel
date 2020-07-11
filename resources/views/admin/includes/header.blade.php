<div class="header w3-hide-small w3-hide-medium">
	<div class="row">
		<div class="col-lg-2">
			<a href="{{URL::to('/admin/home')}}"><img src="{{ asset('img/logo_a.png') }}" alt="logo"></a>
		</div>
            <nav class="col-lg-10 navbar navbar-expand-sm justify-content-end">
				<a href="{{ route('admin.reg') }}" class="w3-bar-item w3-button w3-hover-khaki w3-right"><span class=" fa fa-sign-in-alt" style="font-size: 20px; margin: 10px;"> Register </span></a>
			
            	@auth
                <div class="w3-dropdown-hover w3-mobile w3-right">
			      <button class="w3-button w3-hover-khaki"><span style="font-size: 20px; margin: 10px;">{{ Auth::user()->name }} <i class="fa fa-caret-down"></i></span></button>
			      <div class="w3-dropdown-content w3-bar-block">
			      	<form action="{{ route('logout') }}" method="POST">
			      		@csrf
			        	<input type="submit" class="w3-bar-item w3-button w3-hover-khaki" value="{{ __('Logout') }}">
			        </form>
			      </div>
			    </div>
            @endauth
	    
		</nav>
	</div>

</div>
<div class="w3-sidebar w3-bar-block w3-animate-left " style="display:none;z-index:5;" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large w3-hover-khaki" onclick="w3_close()">Close &times;</button>
<a href="#" class="w3-bar-item w3-button w3-hover-khaki"><span class=" fa fa-search" style="font-size: 20px; margin: 10px;"> Search </span></a>
<a href="#" class="w3-bar-item w3-button w3-hover-khaki"><span class=" fa fa-store" style="font-size: 20px; margin: 10px;"> Store </span></a>
<a href="#" class="w3-bar-item w3-button w3-hover-khaki"><span class=" fa fa-sign-in-alt" style="font-size: 20px; margin: 10px;"> Login </span></a>
<a href="#" class="w3-bar-item w3-button w3-hover-khaki"><span class=" fa fa-registered" style="font-size: 20px; margin: 10px;"> <b>Register</b> </span></a>
</div>
<div class="w3-overlay w3-animate-opacity " onclick="w3_close()" style="cursor:pointer" id="myOverlay"></div>
<button class="w3-button w3-white w3-xxlarge w3-hide-large" onclick="w3_open()">&#9776;</button>