<header id="header">
	<div class="inner">
		<div class="content">
			<h1>Photograph</h1>
			
			@guest
				<h2>Help you to have beautiful photos<br />
				login and schedule</h2>

				<div class="group-login">
					<a id="btn_none_login" href="{{route('user.page.auth.login')}}" class="btn-login"><span><i class="fa fa-sign-in" aria-hidden="true"></i> Let's Go</span></a>
					<a id="btn_none_home" href="{{route('user.page.home.index')}}" class="btn-login"><span><i class="fa fa-home" aria-hidden="true"></i> Home</span></a>
				</div>
			@endguest

			@auth
				<h2>Help you to have beautiful photos<br /></h2>

				<div class="group-login">
					<a id="btn_home" href="{{route('user.page.home.index')}}" class="btn-login"><span><i class="fa fa-home" aria-hidden="true"></i> Home</span></a>
					<a id="btn_account" href="{{route('user.page.account.index')}}" class="btn-login d-none"><span><i class="fa fa-user" aria-hidden="true"></i> Account</span></a>
				</div>

				<div class="group-login">
					<button id="btn_logout" class="btn-login"><span><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</span></button>
				</div>
			@endauth
			

			<div>
				<a href="#" class="button big alt"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
			</div>
		</div>

		<a href="#" class="button hidden"><span>Let's Go</span></a>
	</div>
</header>