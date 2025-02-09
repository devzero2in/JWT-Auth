<nav class="fixed top-0 z-50 w-full bg-gray-600 shadow-lg">
    <div class="px-3 py-2 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <a href="#" class="flex ms-2 md:me-24">
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">JWT Auth</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <div class="relative w-8 h-8 overflow-hidden bg-gray-100 rounded-full">
                                <svg class="absolute w-10 h-10 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                    <div class="hidden absolute right-0 w-48 mt-2 text-base list-none bg-slate-800 divide-y divide-gray-100 rounded shadow" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-white" role="none">
                                <span id="nameData" class="font-medium"></span> <span id="lastNameData" class="font-medium"></span>
                            </p>
                            <p class="text-sm font-medium text-white truncate" role="none">
                                <span id="emailData" class="font-medium"></span>
                            </p>
                        </div>
                        <ul class="" role="none">

                            <li class="px-2 py-1">
                                <a href="{{ route('admin.profile') }}" class="flex items-center w-full p-2 rounded-lg text-sm text-white hover:bg-gray-700">
                                    <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 14c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                                    </svg>
                                    Profile
                                </a>
                            </li>

                            <li class="px-2 pb-2">
                                <button onclick="handleLogout()" type="submit" class="flex items-center w-full px-2 py-2 rounded-lg text-sm text-white hover:bg-gray-700">
                                    <svg class="w-5 h-5 me-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 5h7V3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h7v-2H5V5zm16 7l-4-4v3H9v2h8v3l4-4z" />
                                    </svg>
                                    Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    $(document).ready(async function() {
       const res = await axios.get('/user-details');
       if(res.status === 200 && res.data['status'] === 'success'){
            $('#nameData').text(res.data['userDetail']['first_name']);
            $('#lastNameData').text(res.data['userDetail']['last_name']);
            $('#emailData').text(res.data['user']['email']);
       }
       else{
        toastr.error('Data Not Found');
       }
    });

    async function handleLogout() {
        const res = await axios.post('/logout');
        if (res.status === 200 && res.data['status'] === 'success') {
            toastr.success(res.data['message']);
            setTimeout(() => {
                window.location.href = '{{ route("login") }}';
            }, 2000);
        } else {
            toastr.error(res.data['message']);
        }
    }
</script>