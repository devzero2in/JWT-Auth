<div class="mt-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-2">Update Profile</h2>
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
</div>

<!-- Update Password Modal -->
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

<script>
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