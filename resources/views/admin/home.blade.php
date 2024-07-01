<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Admin Dashboard') }}
    </h2>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
            {{ __('Logout') }}
        </x-responsive-nav-link>
    </form>

  </x-slot>

  </x-app-layout>
