<footer class="footer footer-center  bg-gray-500 text-primary-content border-0 rounded-none">
  <aside>
    <img src="{{asset('img/https___imagecdn.copymatic.ai_bb000d1b-d938-41f5-ab14-1fbd20402d99-0-removebg-preview.png')}}" 
      class="rounded-md img-editable w-24 h-24" 
      alt="logo">
     
  </aside> 
  <nav>
    <div class="grid grid-flow-col gap-4">
      <x-nav-link :href="('termscondition')"  :active="request()->routeIs('termscondition')">
        {{ __('Terms') }}
      </x-nav-link>

      <x-nav-link :href="('privacy')"  :active="request()->routeIs('privacy')">
        {{ __('Privacy') }}
      </x-nav-link>
    </div>
  </nav>
</footer>
