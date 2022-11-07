<x-volt-app :title="__('laravolt::label.users')">

    <x-slot name="actions">
        <x-volt-link-button
                :url="route('users.create')"
                icon="plus"
                :label="__('laravolt::action.add')"/>
    </x-slot>

    @livewire(\App\Http\Livewire\Table\UserTable::class)

</x-volt-app>
