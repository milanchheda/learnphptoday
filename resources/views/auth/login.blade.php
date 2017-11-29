@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center pt-4">
    <div class="bg-white rounded border-2 max-w-sm flex-1 my-8">
    <div class="bg-grey-lighter px-8 py-4 text-grey-darker font-bold">Login</div>
        <form class="px-8 py-6" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="mb-4">
                <label for="email" class="block text-grey-darker text-sm font-bold mb-2">E-Mail Address</label>

                <div class="">
                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker {{ $errors->has('email') ? ' border border-red' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="text-red text-xs italic">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="">
                <label for="password" class="block text-grey-darker text-sm font-bold mb-2">Password</label>

                <div class="">
                    <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker mb-3 {{ $errors->has('password') ? ' border-red' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="text-red text-xs italic">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

    <!--                         <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>
    -->
            <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">
                        Login
                    </button>
            </div>
        </form>
    </div>
</div>
@endsection
