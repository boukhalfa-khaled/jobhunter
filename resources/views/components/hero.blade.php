<section class="text-gray-100 body-font   flex justify-center items-center h-[calc(100vh-4.5rem)]">
  <div class="container mx-auto flex flex-col px-5  justify-center items-center">
      <div class="w-full md:w-2/3 flex flex-col items-center text-center">
          <h1 class="title-font uppercase mb-6 text-4xl md:text-4xl font-medium text-primary">Top jobs in the industry</h1>
          <p class="mb-8 leading-relaxed">Whether you're looking to move to a new role or just seeing what's available, we've gathered this comprehensive list of open positions from a variety of companies and locations for you to choose from.</p>
          <form class="flex w-full justify-center items-center flex-col  md:flex-row gap-5" action="{{ route('listings.index') }}" method="GET">
              <div class="relative md:mr-4 w-full lg:w-1/2 text-left">
                  {{-- <input type="text" id="s" name="s" value="{{ request()->get('s') }}" class="w-full bg-gray-100 bg-opacity-50 rounded focus:ring-2 focus:ring-indigo-200  border border-gray-300  text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> --}}
                  <input type="text" id="s" name="s" value="{{ request()->get('s')}}" class="w-full  bg-background outline-none border-1 h-12  border-primary focus:border-primary" placeholder="Backend, Frontend, FullStack, HR ">
              </div>

                <button type="submit" class=' md:h-12 py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28'>
                    Search
                </button>
          </form>
      </div>
  </div>
</section>