<x-volt-app :title="__('laravolt::label.edit_user')">

    <x-slot name="actions">
        <x-volt-backlink :url="route('users.index')" />
    </x-slot>

    <x-volt-panel :title="$user->name">
        <div class="ui tabular secondary pointing menu left attached">
            <a class="item {{ ($tab == 'account')?'active':'' }}"
               href="{{ route('account.edit', $user['id']) }}">@lang('laravolt::menu.account')</a>
        </div>
        <div class="ui basic segment bottom attached p-2 b-0" data-tab="first">
            @yield('content-user-edit')
        </div>
    </x-volt-panel>

</x-volt-app>
