@extends('layouts.home')

@section('title')
{{ __('frontend.mis_beneficios')}}
@endsection('title')
 
@section('content')

<section class="hero is-light" style="height: 212px">
    <div class="hero-body" style="display: flex; align-items: center; justify-content: center;">
        <h1 class="title align-center" >{{ __('frontend.mis_beneficios') }}</h1>

    </div>
</section>

<div class="section content">




  	@if (auth()->user()->esAdmin())
  		<iframe style="width: -webkit-fill-available; height: -webkit-fill-available;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ-2GAqHvP1LFNI2Dc8jngX0xkHGjyiDX7uG-zbg8ZgPfaipF350hMAC6reCCmydT_0vM8PDsCD64NA/pubhtml?gid=1886865329&amp;single=true&amp;widget=false&amp;range=B4:G21"></iframe>
  	@elseif(auth()->user()->esAlumni())
	    <iframe style="width: -webkit-fill-available; height: -webkit-fill-available;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vQ-2GAqHvP1LFNI2Dc8jngX0xkHGjyiDX7uG-zbg8ZgPfaipF350hMAC6reCCmydT_0vM8PDsCD64NA/pubhtml?gid=1886865329&amp;single=true&amp;widget=false&amp;range=B4:G21"></iframe>
	@else
		<iframe style="width: -webkit-fill-available; height: -webkit-fill-available;" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vRFHJKxwCwmF7Qu6hyMMB0RZvNeRrBkxMBnbwEA2dTChqaS1HtqqCqyj8ZGFKQ3GRQxvZJuAOdzF8vD/pubhtml?gid=1886865329&amp;single=true&amp;widget=false&amp;range=B4:G21"></iframe>
	@endif
  </tbody>
</table>
	
</div>
@endsection('content') 