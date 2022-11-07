<x-volt-base>
    <div class="layout--auth is-{!! config('laravolt.ui.login_layout') !!}">
        <div class="layout--auth__container">
            <div>
                {{-- Change Logo In here --}}
                <x-volt-brand-image/>
            </div>


            <div class="x-auth">
                <main class="x-auth__content" up-main="root">
                    <div class="p-2">
                        <x-volt-brand-image/>
                    </div>

                    <h3 class="ui header horizontal divider section">@lang('laravolt::auth.login')</h3>

                    {!! form()->open(route('auth::login.store'))->attribute('up-target', 'body') !!}
                    {!! form()->text('user_code')->label(__('Username')) !!}
                    {!! form()->password('password')->label(__('laravolt::auth.password')) !!}
                
                    @if(config('laravolt.platform.features.captcha'))
                        <div class="field">
                            {!! app('captcha')->display() !!}
                            {!! app('captcha')->renderJs() !!}
                
                        </div>
                    @endif
                
                    <div class="ui field m-b-2">
                        <div class="ui equal width grid">
                            <div class="column left aligned">
                                <div class="ui checkbox">
                                    <input type="checkbox" name="remember" {{ request()->old('remember')?'checked':'' }}>
                                    <label>@lang('laravolt::auth.remember')</label>
                                </div>
                            </div>
                            <div class="column right aligned">
                                <a themed href="{{ route('auth::forgot.show') }}"
                                   class="link">@lang('laravolt::auth.forgot_password')</a>
                            </div>
                        </div>
                    </div>
                
                    <div class="field action">
                        <x-volt-button class="fluid">@lang('laravolt::auth.login')</x-volt-button>
                    </div>
                
                    @if(config('laravolt.platform.features.registration'))
                        <div class="ui divider section"></div>
                        <div>
                            @lang('laravolt::auth.not_registered_yet?')
                            <a themed href="{{ route('auth::registration.show') }}"
                               class="link">@lang('laravolt::auth.register_here')</a>
                        </div>
                    @endif
                    {!! form()->close() !!}

                </main>
            </div>
        </div>
    </div>
</x-volt-base>