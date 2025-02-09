<x-app-layout>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <!-- Profile Header -->
        <div class="flex items-center space-x-4 border-b pb-4">
            <img class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover"
                src="{{ asset('images/default-user.png') }}"
                alt="User Avatar">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800"><span id="username"></span></h2>
                <p class="text-gray-500"><span id="email"></span></p>
                <span class="px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded capitalize"><span id="role"></span> </span>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Profile Information</h2>
            <div class="bg-gray-100 p-4 rounded-lg border">
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="text-gray-600 font-medium">Full Name</label>
                        <p class="text-gray-900" id="fullname"></p>
                    </div>
                    <div>
                        <label class="text-gray-600 font-medium">Contact Number</label>
                        <p class="text-gray-900" id="contact"></p>
                    </div>
                    <div>
                        <label class="text-gray-600 font-medium">Alternative Contact</label>
                        <p class="text-gray-900 capitalize" id="altcontact"></p>
                    </div>
                    <div>
                        <label class="text-gray-600 font-medium">Emergency Contact</label>
                        <p class="text-gray-900 capitalize" id="emergencycontact"></p>
                    </div>
                    <div>
                        <label class="text-gray-600 font-medium">Address</label>
                        <p class="text-gray-900 capitalize" id="address"></p>
                    </div>
                    <div>
                        <label class="text-gray-600 font-medium">Joined</label>
                        <p class="text-gray-900" id="created_at"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Update Form -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Update Profile</h2>
            <!-- <form action="#" method="POST" enctype="multipart/form-data" class="bg-gray-50 p-4 rounded-lg border">
                @csrf
                @method('PUT') -->
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-1">
                    <label class="block text-gray-600 font-medium text-sm">First Name</label>
                    <input type="text" name="first_name" id="first_name"
                        class="w-full px-2 py-1 text-sm border rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-1">
                    <label class="block text-gray-600 font-medium text-sm">Last Name</label>
                    <input type="text" name="last_name" id="last_name"
                        class="w-full px-2 py-1 text-sm border rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-1">
                    <label class="block text-gray-600 font-medium text-sm">Contact Number</label>
                    <input type="text" name="contact" id="txtcontact"
                        class="w-full px-2 py-1 text-sm border rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-1">
                    <label class="block text-gray-600 font-medium text-sm">Alternative Contact</label>
                    <input type="text" name="alt_contact" id="alt_contact"
                        class="w-full px-2 py-1 text-sm border rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-1">
                    <label class="block text-gray-600 font-medium text-sm">Emergency Contact</label>
                    <input type="text" name="emergency_contact" id="emergency_contact"
                        class="w-full px-2 py-1 text-sm border rounded focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-1">
                    <label class="block text-gray-600 font-medium text-sm">Address</label>
                    <textarea type="text" name="txtaddress" id="txtaddress"
                        class="w-full px-2 py-1 text-sm border rounded focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <div class="flex justify-between items-center">
                    <button type="submit" onclick="updateProfile()" class="btn-submit px-3 py-2 text-sm bg-blue-500 text-white rounded hover:bg-blue-600">
                        Save Changes
                    </button>

                    <!-- Modal toggle -->
                    <button data-modal-target="updatepassword-modal" data-modal-toggle="updatepassword-modal" class="block btn-dark-sm" type="button">
                        Change Password
                    </button>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>

    <!-- Main modal -->
    <div id="updatepassword-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Change Password
                    </h3>
                    <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updatepassword-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div class="space-y-4">
                        <div class="mb-2">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                            <input type="password" name="password" id="password" placeholder="Enter New Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <div class="mb-2">
                            <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                        </div>
                        <button type="submit" onclick="updatePassword()" class="btn-submit w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Password</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    getUserData();

    async function getUserData() {
        let name = $('#username');
        let email = $('#email');
        let role = $('#role');
        let fullname = $('#fullname');
        let contact = $('#contact');
        let altcontact = $('#altcontact');
        let emergencycontact = $('#emergencycontact');
        let address = $('#address');
        let joining = $('#created_at');
        let first_name = $('#first_name');
        let last_name = $('#last_name');
        let txtcontact = $('#txtcontact');
        let alt_contact = $('#alt_contact');
        let emergency_contact = $('#emergency_contact');
        let txtaddress = $('#txtaddress');

        const res = await axios.get('/user-details')
        if (res.status === 200 && res.data['status'] === 'success') {
            name.text(res.data['user']['username']);
            email.text(res.data['user']['email']);
            role.text(res.data['user']['role']);
            fullname.text((res.data['userDetail']['first_name']) + " " + (res.data['userDetail']['last_name']));
            contact.text(res.data['userDetail']['contact']);
            altcontact.text(res.data['userDetail']['alt_contact']);
            emergencycontact.text(res.data['userDetail']['emergency_contact']);
            address.text(res.data['userDetail']['address']);
            txtaddress.val(res.data['userDetail']['address']);

            //date format('d M, Y')
            const created_at = moment(res.data['user']['created_at']).format('DD MMM, YYYY');
            joining.text(created_at);
            first_name.val(res.data['userDetail']['first_name']);
            last_name.val(res.data['userDetail']['last_name']);
            txtcontact.val(res.data['userDetail']['contact']);
            alt_contact.val(res.data['userDetail']['alt_contact']);
            emergency_contact.val(res.data['userDetail']['emergency_contact']);
        } else {
            toastr.error('Data not found');
        }
    }

    async function updateProfile() {
        let first_name = $('#first_name').val();
        let last_name = $('#last_name').val();
        let contact = $('#txtcontact').val();
        let alt_contact = $('#alt_contact').val();
        let emergency_contact = $('#emergency_contact').val();
        let address = $('#txtaddress').val();

        showLoader('.btn-submit');
        let res = await axios.put('/update-profile', {
            first_name,
            last_name,
            contact,
            alt_contact,
            emergency_contact,
            address
        });
        hideLoader('.btn-submit');

        if (res.status === 200 && res.data['status'] === 'success') {
            toastr.success(res.data['message']);
            getUserData();
        } else {
            toastr.error(res.data['message']);
        }
    }

    async function updatePassword() {
        let password = $('#password').val();
        let confirmPassword = $('#confirmPassword').val();

        if (password.length === 0) {
            toastr.error('Password is required');
        } else if (password != confirmPassword) {
            toastr.error('Password does not match');
        } else {
            showLoader('.btn-submit');
            let res = await axios.put('/update-password', {
                password
            });

            hideLoader('.btn-submit');

            if (res.status === 200 && res.data['status'] === 'success') {
                toastr.success(res.data['message']);
                setTimeout(() => {
                    $('#password').val('');
                    $('#confirmPassword').val('');
                    $('#updatepassword-modal').hide();
                    window.location.reload();
                }, 2000);
            } else {
                toastr.error(res.data['message']);
            }
        }
    }
</script>