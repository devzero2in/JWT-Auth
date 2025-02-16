<!-- User Sidebar -->
<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-[210px] h-screen pt-20 transition-transform bg-gray-800 border-r border-gray-200 duration-300" aria-label="Sidebar">
   <button id="toggleSidebarButton" type="button" class="absolute -right-3 top-1/2 transform -translate-y-1/2 bg-gray-800 text-gray-300 hover:text-white rounded-full p-1.5 focus:outline-none focus:ring-2 focus:ring-gray-200">
      <span class="sr-only">Toggle sidebar</span>
      <svg id="toggleIcon" class="w-4 h-4 transition-transform duration-300" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
         <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
      </svg>
   </button>
   <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">
      <ul class="space-y-2 font-medium">
         <li>
            <a href="{{ route('user.dashboard') }}"
               class="flex items-center p-2 rounded-lg group {{ request()->routeIs('user.dashboard') ? 'text-white bg-gray-700' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
               <svg class="w-5 h-5 {{ request()->routeIs('user.dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-6h2v2h-2zm0-8h2v6h-2z" />
               </svg>
               <span class="ms-3">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="{{ route('user.profile') }}"
               class="flex items-center p-2 rounded-lg group {{ request()->routeIs('user.profile') ? 'text-white bg-gray-700' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
               <svg class="w-5 h-5 {{ request()->routeIs('user.profile') ? 'text-white' : 'text-gray-400 group-hover:text-white' }} transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
               </svg>
               <span class="ms-3">Profile</span>
            </a>
         </li>
         <li id="userSidebar">
            <a href="{{ route('user.dashboard') }}"
               class="flex items-center p-2 rounded-lg group text-gray-300 hover:bg-gray-700 hover:text-white">
               <svg class="w-5 h-5 text-gray-400 group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-6h2v2h-2zm0-8h2v6h-2z" />
               </svg>
               <span class="ms-3">Orders</span>
            </a>
         </li>
      </ul>
   </div>
</aside>