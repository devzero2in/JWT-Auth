<x-admin-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center pr-5">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">User List</h1>
            <button id="addUserModalButton" data-modal-target="addUserModal" data-modal-toggle="addUserModal" 
                class="btn-dark-sm">+ Add User</button>
        </div>
        <!-- Search Bar -->
        <div class="flex justify-between items-center mb-4">
            <input type="text" id="searchInput" placeholder="Search users..."
                class="px-2 py-1 border text-sm rounded w-1/3 focus:ring focus:ring-blue-300">
            
        </div>

        <!-- Users Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg pr-5">
            <table class="w-full border-collapse" id="userTable">
                <thead>
                    <tr class="bg-gray-100 border-b">
                        <th class="px-3 py-2 text-sm text-left">Sl</th>
                        <th class="px-3 py-2 text-sm text-left">Image</th>
                        <th class="px-3 py-2 text-sm text-left">Name</th>
                        <th class="px-3 py-2 text-sm text-left">Username</th>
                        <th class="px-3 py-2 text-sm text-left">Email</th>
                        <th class="px-3 py-2 text-sm text-left">Contact</th>
                        <th class="px-3 py-2 text-sm text-center">Role</th>
                        <th class="px-3 py-2 text-sm text-center">Status</th>
                        <th class="px-3 py-2 text-sm text-left">Joined</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody id="userTableBody" class="list">
                </tbody>
            </table>
        </div>

        <!-- Add User Modal Form -->
        <div id="addUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Add New User
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addUserModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div>
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                            </div>
                            <div>
                                <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Username" required="">
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Password" required="">
                            </div>
                            <div>
                                <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Confirm Password" required="">
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <button onclick="addUser()" class="btn-submit text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Add new user
                            </button>
                            <!-- add a modal close button -->
                            <button data-modal-hide="addUserModal" class="btn-dark-sm">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Permission Modal -->
        <div id="editPermissionModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Edit Permission - <span id="editPermissionUserName" class="underline italic"></span>
                        </h3>
                        <button type="button" class="editPermissionModalClose text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editPermissionModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <input type="hidden" id="id">
                            <div>
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <select id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <div>
                                <label for="is_active" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="is_active" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <button type="submit" onclick="updatePermission()" class="btn-submit text-white inline-flex items-center bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                </svg>
                                Update Permission
                            </button>
                            <button class="btn-dark-sm editPermissionModalClose">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-4">

        </div>
    </div>
</x-admin-layout>

<script>
    // Search filter for user table
    $(document).ready(function() {
        getUsersData();

        $('#searchInput').on('keyup', function() {
            let filter = $(this).val().toLowerCase();
            $('#userTableBody tr').each(function() {
                let name = $(this).children().eq(1).text().toLowerCase();
                let username = $(this).children().eq(2).text().toLowerCase();
                let email = $(this).children().eq(3).text().toLowerCase();
                let contact = $(this).children().eq(4).text().toLowerCase();
                $(this).toggle(name.includes(filter) || username.includes(filter) || email.includes(filter) || contact.includes(filter));
            });
        });
    });


    async function getUsersData() {
        let tbody = $('#userTableBody');

        const res = await axios.get('/admin/all-users');
        tbody.empty();

        if (res.status === 200 && res.data['status'] === 'success') {
            console.log(res.data['users']);
            res.data['users'].map((user, index) => {
                const created_at = moment(user['created_at']).format('DD MMM, YYYY');
                const showEditButton = user['email'] !== 'admin@email.com' ? true : false;

                let row = `
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-3 py-2 text-sm">${index + 1}</td>
                        
                        ${user['user_detail']['avatar'] ? `<td class="px-3 py-2 text-sm">
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/') }}/${user['user_detail']['avatar']}" alt="Avatar">
                        </td>` : `<td class="px-3 py-2 text-sm">
                            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name=${user['user_detail']['first_name']}+${user['user_detail']['last_name']}" alt="Avatar">
                        </td>`}

                        <td class="px-3 py-2 text-sm font-medium">${user['user_detail']['first_name']} ${user['user_detail']['last_name']}</td>
                        <td class="px-3 py-2 text-sm text-gray-600">${user['username']}</td>
                        <td class="px-3 py-2 text-sm text-gray-600">${user['email']}</td>
                        <td class="px-3 py-2 text-sm font-medium">${user['user_detail']['contact']}</td>
                        <td class="px-3 py-2">
                            <span class="px-2 py-1 text-xs font-medium text-white ${user['role'] === 'admin' ? 'bg-blue-500' : 'bg-gray-500'} rounded capitalize">
                                ${user['role']}
                            </span>
                        </td>
                        <td class="px-3 py-2">
                            <span class="px-2 py-1 text-xs font-medium text-white ${user['is_active'] ? 'bg-green-500' : 'bg-red-500'} rounded capitalize">
                                ${user['is_active'] ? 'Active' : 'Inactive'}
                            </span>
                        </td>
                        <td class="px-3 py-2 text-sm text-gray-600">${created_at}</td>
                        <td class="px-3 py-2 flex justify-center space-x-2">
                            
                            ${showEditButton ? `<button data-role="${user['role']}" data-is_active="${user['is_active']}" data-id="${user['id']}" data-first_name="${user['user_detail']['first_name']}" data-last_name="${user['user_detail']['last_name']}" class="btn-primary-sm edit-permission-btn">Edit Permission</button>`:``}
                            
                        </td>
                    </tr>
                `;
                tbody.append(row);
            });

            // Attach event listener after rows are added
            attachEditPermissionClick();
        } else {
            toastr.error(res.data['message']);
        }
    }

    function attachEditPermissionClick() {
        $('.edit-permission-btn').on('click', function() {
            let id = $(this).data('id');
            let role = $(this).data('role');
            let is_active = $(this).data('is_active');
            let fullname = $(this).data('first_name') + ' ' + $(this).data('last_name');

            $('#role').val(role);
            $('#is_active').val(is_active);
            $('#id').val(id);
            $('#editPermissionUserName').text(fullname);

            // Store the user ID in modal
            $('#editPermissionModal').data('user-id', id);

            // Open modal using Flowbite's API
            const modal = new Modal(document.getElementById('editPermissionModal'));
            modal.show();
        });
    }

    async function updatePermission() {
        let id = $('#id').val();
        let role = $('#role').val();
        let is_active = $('#is_active').val();

        showLoader('.btn-submit');
        let res = await axios.post('/admin/edit-permission/' + id, {
            role,
            is_active
        });
        hideLoader('.btn-submit');

        if (res.status === 200 && res.data['status'] === 'success') {
            toastr.success(res.data['message']);
            $('#editPermissionModal').data('user-id', null);
            setTimeout(() => {
                const modal = new Modal(document.getElementById('editPermissionModal'));
                modal.hide();
                getUsersData();
            }, 1000);
        } else {
            toastr.error(res.data['message']);
        }
    }

    // Close edit permission modal
    $('.editPermissionModalClose').on('click', function() {
        $('#editPermissionModal').data('user-id', null);
        const modal = new Modal(document.getElementById('editPermissionModal'));
        modal.hide();
    });


    async function addUser() {
        let first_name = $('#first_name').val();
        let last_name = $('#last_name').val();
        let username = $('#username').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let password_confirmation = $('#confirm_password').val();

        if (first_name.length === 0) {
            toastr.error('First name is required');
        } else if (last_name.length === 0) {
            toastr.error('Last name is required');
        } else if (username.length === 0) {
            toastr.error('Username is required');
        } else if (email.length === 0) {
            toastr.error('Email is required');
        } else if (password.length === 0) {
            toastr.error('Password is required');
        } else if (password !== password_confirmation) {
            toastr.error('Password does not match');
        } else {
            showLoader('.btn-submit');
            const res = await axios.post('/admin/add-user', {
                first_name,
                last_name,
                username,
                email,
                password
            });

            hideLoader('.btn-submit');

            if (res.status === 200 && res.data['status'] === 'success') {
                toastr.success(res.data['message']);
                setTimeout(() => {
                    $('#first_name').val('');
                    $('#last_name').val('');
                    $('#username').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#confirm_password').val('');
                    $('#addUserModal').hide();
                    window.location.reload();
                }, 2000);
            } else {
                toastr.error(res.data['message']);
            }
        }
    }
</script>