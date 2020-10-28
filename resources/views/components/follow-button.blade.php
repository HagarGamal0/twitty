@unless(auth()->check() && auth()->user()->is($user))        

    

<form method="POST" action="/profile/{{$user->name}}/follows">
    @csrf
          <button type="submit"
     class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
     {{auth()->user()->following($user) ? 'unfollow me' : 'follow me'}}</button>

    </form>
    @endunless 