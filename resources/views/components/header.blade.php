<header class=" border-b border-primary container m-auto flex justify-between items-center py-5 px-4 h-[4.5rem]">
  <div >
    <a class="text-white text-lg md:text-2xl  font-bold hover:text-primary duration-300 transition-colors" href="{{ route('listings.index') }}">
      JOBHUNTER
    </a>
  </div>

  <div class="space-x-3">
    @auth
    <a
        href="{{ route('listings.create') }}"
    class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 text-white   hover:text-primary transition-colors duration-300 md:w-28'>
      
    </a>

      <a href="{{route('dashboard')}}" class='bg-background py-2 px-2 inline-flex text-xs md:text-base  justify-center font-bold uppercase border-2 hover:bg-primary hover:text-background  border-primary text-white  transition-colors duration-300 w-20 md:w-32'>
        Dashboard
      </a>
    <a
        href="{{ route('listings.create') }}"
    class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28'>
      Post A Job
    </a>

    @endauth
    @guest
        
<a href="{{ route('register') }}" class='bg-background py-2 px-2 inline-flex text-xs md:text-base  justify-center font-bold uppercase border-2 hover:bg-primary hover:text-background  border-primary text-white  transition-colors duration-300 md:w-28'>
  Sign up
</a>
<a
    href="{{ route('login') }}"
 class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28'>
  Log in
</a>
    @endguest
  </div>

</header>