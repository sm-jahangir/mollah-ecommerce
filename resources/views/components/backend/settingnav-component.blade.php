<ul class="nav nav-pills card-header-pills">
	<li class="nav-item">
		<a class="nav-link {{ Request::is('app/settings/general') ? 'active' : '' }}" href="{{ route('app.settings.general') }}">General settings</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ Request::is('app/settings/appearance') ? 'active' : '' }}" href="{{ route('app.settings.appearance.index') }}">Apparence</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ Request::is('app/settings/mail') ? 'active' : '' }}" href="{{ route('app.settings.mail.index') }}">Mail Configration</a>
	</li>
	<li class="nav-item">
		<a class="nav-link {{ Request::is('app/settings/socialite') ? 'active' : '' }}" href="{{ route('app.settings.socialite.index') }}">Socialite Configration</a>
	</li>
</ul>
