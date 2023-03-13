<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Menu Solicitação') }}
      </h2>
  </x-slot>
</x-app-layout>
<style>
  div.bg-white {
   border: 10px solid white;
}

</style>
  <div class="py-12">
    <div class="max-w-8xl mx-auto sm:px-8 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
          {{ session('status') }}
        </div>
        @endif

        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">Cadastrar Usuários</h2>

        <form method="POST" action="{{ route('register-users') }}">
          @csrf

          <!-- Nome -->
          <div>
            <x-label for="name" :value="__('Name')" />

            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
          </div>

          <!-- Email  -->
          <div class="mt-4">
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
          </div>

          <!-- Password -->
          <div class="mt-4">
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
          </div>

          <!-- Confirma Password -->
          <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
          </div>

          <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
              {{ __('Register') }}
            </x-button>
          </div>
        </form>
      </div>
    </div>
  </div>



  @if(session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  <script>
    setTimeout(function() {
      window.location.href = "{{ route('register-users') }}";
    }, 3000);

  </script>
  @endif

</x-app-layout>
