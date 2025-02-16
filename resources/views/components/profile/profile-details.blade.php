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

<script>
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

            // if userDetail['avatar'] is exists then show image
            if (res.data['userDetail']['avatar']) {
                $('.user-avatar').attr('src', "{{ asset('storage/') }}/" + res.data['userDetail']['avatar']);
            }else{
                $('.user-avatar').attr('src', "{{ asset('images/default-user.png') }}");
            }
            // src="{{ asset('images/default-user.png') }}"
        } else {
            toastr.error('Data not found');
        }
    }
</script>