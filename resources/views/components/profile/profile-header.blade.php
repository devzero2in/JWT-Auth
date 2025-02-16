<div class="flex items-center space-x-4 border-b pb-4">
    <img class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover hover:cursor-pointer hover:opacity-75 user-avatar"
        alt="User Avatar"
        onclick="document.getElementById('avatarInput').click();">
    <div>
        <h2 class="text-2xl font-semibold text-gray-800"><span id="username"></span></h2>
        <p class="text-gray-500"><span id="email"></span></p>
        <span class="px-3 py-1 text-sm font-semibold bg-blue-100 text-blue-800 rounded capitalize"><span id="role"></span> </span>
    </div>
</div>

<!-- Hidden File Input -->
<input type="file" id="avatarInput" class="hidden" accept="image/*">

<!-- Avatar Upload Modal -->
<div id="uploadModal" tabindex="-1" class="hidden fixed inset-0 z-50 items-center justify-center w-full p-4 overflow-x-hidden overflow-y-auto bg-black/50">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Preview Avatar
                </h3>
                <button type="button" class="uploadModalClose text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="uploadModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <img id="previewAvatar" class="w-full h-64 object-cover rounded-lg">
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                <button data-modal-hide="uploadModal" type="button" class="uploadModalClose text-gray-500 bg-white hover:bg-gray-100 rounded-lg border border-gray-200 px-5 py-2.5">Cancel</button>
                <button type="button" id="uploadButton" class="btn-submit text-white bg-blue-700 hover:bg-blue-800 rounded-lg px-5 py-2.5">Upload</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('#avatarInput').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewAvatar').attr('src', e.target.result);
                const modal = new Modal($('#uploadModal')[0]); // Convert jQuery object to DOM element
                modal.show();
            };
            reader.readAsDataURL(file);
        }
    });

    $('#uploadButton').on('click', async function() {
        const fileInput = $('#avatarInput')[0];
        const file = fileInput.files[0];

        if (!file) {
            toastr.error('Please select a file first');
            return;
        }

        const formData = new FormData();
        formData.append('avatar', file);
        formData.append('_token', '{{ csrf_token() }}');

        try {
            showLoader('.btn-submit');
            const res = await axios.post('{{ route("avatar.upload") }}', formData, {
                // headers: {
                //     'Content-Type': 'multipart/form-data'
                // }
            });
            hideLoader('.btn-submit');

            if (res.data['status'] === 'success') {
                $('.user-avatar').attr('src', res.data['avatar'] + '?' + Date.now());
                toastr.success(res.data['message']);
                const modal = new Modal(document.getElementById('uploadModal'));
                modal.hide();
                fileInput.value = '';
            } else {
                alert('Upload failed: ' + (res.data['message'] || 'Server error'));
            }
        } catch (error) {
            console.error('Error:', error);
            const errorMessage = error.res?.data?.message || 'An error occurred during upload.';
            alert(errorMessage);
        }
    });
    
    $('.uploadModalClose').on('click', function() {
        $('#avatarInput').val('');
        const modal = new Modal(document.getElementById('uploadModal'));
        modal.hide();
    });
</script>