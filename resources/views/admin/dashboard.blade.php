<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Article Dashboard') }}
        </h2>
    </x-slot>

            <div class="py-12">
              <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="lg:grid grid-cols-3 gap-3">
                        
                      <!-- card -->
                        <!-- All Users -->
                          <div>
                            <div class="rounded border border-grey-400 overflow-hidden shadow-lg">
                                <div class="px-6 py-4">
                                  <div class="font-bold text-xl mb-2 capitalize">
                                    {{__('view all users')}}
                                  </div>
                                
                                </div>
                                <div class="px-6 py-4">
                                  <span class="inline-block bg-gray-700 rounded-full px-3 py-1 text-sm font-semibold text-gray-100">
                                    <a href="{{route('user.index')}}">
                                        {{__('click here')}}
                                    </a>
                                  </span>
                                  <span class="inline-block bg-gray-700 rounded-full px-3 py-1 text-sm font-semibold text-gray-100">
                                   
                                    {{__('300')}}
                                     
                                  </span>
                                </div>
                            </div>
                          </div>
                        <!-- All Users -->

                        <!-- ARTICLE COUNT -->
                          <div>
                            <div class="rounded border border-grey-400 overflow-hidden shadow-lg">
                                <div class="px-6 py-4">
                                  <div class="font-bold text-xl mb-2 capitalize">
                                    {{__('all articles')}}
                                  </div>
                                
                                </div>
                                <div class="px-6 py-4">
                                  <span class="inline-block bg-gray-700 rounded-full px-3 py-1 text-sm font-semibold text-gray-100">
                                  
                                    <a href="{{route('list-article')}}">
                                      {{__('click here')}}
                                    </a>
                                  </span>
                                  <span class="inline-block bg-gray-700 rounded-full px-3 py-1 text-sm font-semibold text-gray-100">
                                 
                                    {{__('400')}}
                                  </span>
                                </div>
                            </div>
                          </div>
                          <!-- ARTICLE COUNT -->

                        <!-- ARTICLE -->
                          <div>
                            <div class="rounded border border-grey-400 overflow-hidden shadow-lg">
                                <div class="px-6 py-4">
                                  <div class="font-bold text-xl mb-2 capitalize">
                                    {{__('shortcuts')}}
                                  </div>
                                
                                </div>
                                <div class="px-6 py-4">
                                  <ul class="list-disc">
                                    <li>
                                      <x-nav-link :href="route('create-article')">
                                        {{ __('add new article') }}
                                      </x-nav-link>    
                                    </li>
                                    
                                  </ul>
                                </div>
                            </div>
                          </div>
                        <!-- ARTICLE -->
                      <!-- Card -->


                    </div>
                  </div>
                </div>
              </div>
            </div>
 

       
</x-app-layout>
