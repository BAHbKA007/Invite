<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)asdasd
-->
@php
@endphp
<html>
	<head>
		<style>
			body {
				background-image: url("https://leichtbewaff.net/invite/storage/app/public/cover_images/overlay.png"), 
				url("https://leichtbewaff.net/invite/storage/app/public/cover_images/{{$var[0]->bg_jpg}}");
				background-repeat: no-repeat;
				background-position: center center;
				background-color: white;
				background-size: cover !important;
			}
		</style>
		<title>{{$var[0]->title}}</title>
		<meta name="names_id" data-id="{{$var[0]->names_id}}">
		<meta charset="utf-8" />
		<meta name="description" content="{{$var[0]->title}}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://leichtbewaff.net/gb/assets/css/pretty-checkbox.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<!-- ****** https://stackoverflow.com/questions/19778620/provide-an-image-for-whatsapp-link-sharing ****** -->
		<meta property="og:title" content="{{$var[0]->title}}" />
		<meta property="og:url" content="https://leichtbewaff.net/home/{{$var[0]->hash}}" />
		<meta property="og:description" content="{{str_replace(',',' und ',str_replace(' ','',$var[0]->names))}}">
		<meta property="og:image" content="https://leichtbewaff.net/invite/storage/app/public/cover_images/{{$var[0]->pic_jpg}}">
		<meta property="og:image:secure_url" content="https://leichtbewaff.net/invite/storage/app/public/cover_images/{{$var[0]->pic_jpg}}" />
		<meta property="og:type" content="website" />
		<meta property="og:locale" content="de_DE" />
        <!-- ****** faviconit.com Favicons ****** -->
        <link rel="shortcut icon" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon.ico">
        <link rel="icon" sizes="16x16 32x32 64x64" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon.ico">
        <link rel="icon" type="image/png" sizes="196x196" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-192.png">
        <link rel="icon" type="image/png" sizes="160x160" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-160.png">
        <link rel="icon" type="image/png" sizes="96x96" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-96.png">
        <link rel="icon" type="image/png" sizes="64x64" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-64.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-16.png">
        <link rel="apple-touch-icon" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-57.png">
        <link rel="apple-touch-icon" sizes="114x114" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-114.png">
        <link rel="apple-touch-icon" sizes="72x72" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-72.png">
        <link rel="apple-touch-icon" sizes="144x144" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-144.png">
        <link rel="apple-touch-icon" sizes="60x60" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-60.png">
        <link rel="apple-touch-icon" sizes="120x120" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-120.png">
        <link rel="apple-touch-icon" sizes="76x76" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-76.png">
        <link rel="apple-touch-icon" sizes="152x152" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-180.png">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/favicon-144.png">
        <meta name="msapplication-config" content="https://leichtbewaff.net/invite/storage/app/public/cover_images/favicon/browserconfig.xml">
        <!-- ****** faviconit.com Favicons ****** -->
		<link rel="stylesheet" href="https://leichtbewaff.net/gb/assets/css/main.css" />
		<link rel="stylesheet" href="https://leichtbewaff.net/gb/assets/css/edit.css">
		<noscript><link rel="stylesheet" href="https://leichtbewaff.net/gb/assets/css/noscript.css" /></noscript>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	</head>
	<body class="is-preload">
		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Nav -->
					<nav id="nav" style="font-size: 25px">
						<a href="#" class="icon fa-home active" ><span>Home</span></a>
						<a href="#Location" class="icon fa-map-marker"><span>Location</span></a>
						@if (isset($var[0]->phone))
						<a href="#Kontakt" class="icon fa-envelope"><span>Kontakt</span></a>
						@endif
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Me -->
							<article id="Home" class="panel intro">
								<header>
									@if (count($var)==2)
									<h1>Hallo {{$var[0]->name." und ".$var[1]->name}}</h1>
									<p>Trefft nachfolgend Eure Auswahl und helft mir damit bei der Planung. Danke.</p>
									@else
									<h1>Hallo {{$var[0]->name}}</h1>
									<p>Triff nachfolgend Deine Auswahl und hilf mir damit bei der Planung. Danke.</p>
									@endif
									{{-- <p>{!!nl2br(e($var[0]->welcome_text))!!}</p> --}}
										@foreach ($var as $i)
										<div class="input-group" style="text-align: center; margin: 1em 0 0 0">
										<h2>{{$i->name}} bist du dabei?</h2>

										<div class="pretty p-switch" >
										<input type="radio" @if ($i->dabei == 1) checked @endif data-bool="1" name="switch{{$i->id}}" id="{{$i->id}}"/>
											<div class="state p-success">
												<label>bin dabei</label>
											</div>
										</div>

										<div class="pretty p-switch p-fill">
											<input type="radio" <?php if (($i->dabei == 0)) {echo 'checked';} ?> data-bool="0" name="switch{{$i->id}}" id="{{$i->id}}"/>
											<div class="state p-success">
											<label>ich passe</label>
											</div>
										</div>
									@endforeach
								</header>
								<a href="#Location" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"><span>See my work</span></span>
									<img src="https://leichtbewaff.net/invite/storage/app/public/cover_images/{{$var[0]->pic_jpg}}" alt="" />
								</a>
	
							</article>
						<!-- Work -->
							<article id="Location" class="panel">
								<header>
									<h2>Location</h2>
								</header>
								<p>
									{!!nl2br(e($var[0]->location_text))!!}
								</p>
							</article>

						<!-- Contact -->
							<article id="Kontakt" class="panel">

								<div style="padding: 2em 0 0 0">
									@if (count($var)==2 && isset($var[0]->welcome_text_plural))
									<p>{!!nl2br(e($var[0]->welcome_text_plural))!!}</p>
									@else
									<p>{!!nl2br(e($var[0]->welcome_text))!!}</p>
									@endif
								<header>
									<h2>Bei Fragen einfach melden:</h2>
								</header>
									<table>
										<tr>
										<th><a class="symb_link" href="tel:+{{$var[0]->phone}}"><i class="symbol_link fas fa-mobile"></i></a></th>
											<th><a class="symb_link" href="https://wa.me/{{$var[0]->phone}}"><i class="symbol_link fab fa-whatsapp"></i></a></th>
										</tr>
									</table>
								</div>
							</article>

					</div>
			</div>

	<!-- Scripts -->
		<script src="https://leichtbewaff.net/gb/assets/js/jquery.min.js"></script>
		<script src="https://leichtbewaff.net/gb/assets/js/browser.min.js"></script>
		<script src="https://leichtbewaff.net/gb/assets/js/breakpoints.min.js"></script>
		<script src="https://leichtbewaff.net/gb/assets/js/util.js"></script>
		<script src="https://leichtbewaff.net/gb/assets/js/main.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script>
			var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

			<?php if (!isset($_GET['nocount'])) { ?>
				$( document ).ready(function() {
					$.ajax({
						url: '/postajax',
						type: 'POST',
						data:{
							_token: CSRF_TOKEN, 
							art: 'count',
							id: $('meta[name=names_id]').attr("data-id")
						},
						success: function (data) {
						}
					});
				});
			<?php } ?>
		
			$('input').click(function(){
				$.ajax({
					url: '/postajax',
					type: 'POST',
					data:{
						_token: CSRF_TOKEN, 
						art: 'dabei',
						id: this.id,
						name: $(this).attr("data-bool")
					},
					success: function (data) {
					}
				});
        	});
		</script>
	</body>
</html>