<div class="border border-blue-400 rounded-lg py-6 px-8 mb-8">
    <form method="POST" action="/tweets">
      @csrf
        <textarea 
        name="body"
          class="w-full"
          placeholder="what's up man"
          required
        ></textarea>


        <hr class="my-4">

        <footer class="flex justify-between">
            <img
             src="{{auth()->user()->avatar }}"
             alt="your avater"
             class="rounded-full mr-2"
             width="40"
             height="40">

             <button type="submit"
              class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white"> 
              put tweet
             </button>
            </footer>
            </form>
        
    
</div>