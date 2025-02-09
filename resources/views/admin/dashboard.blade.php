<x-admin-layout>
    <h3>Admin Dashboard</h3>

    <div>
        <button onclick="logout()">Logout</button>
    </div>
</x-admin-layout>

<script>
    $(document).ready(function() {
       if('{{ Session::has("toast_warning") }}') {
            toastr.warning('{{ Session::get("toast_warning") }}');
       }
    });
    
    async function logout() {
        const res = await axios.post('/logout');
        if(res.status === 200 && res.data['status'] === 'success'){
            toastr.success(res.data['message']);
            setTimeout(() => {
                window.location.href = '{{ route("login") }}';
            }, 2000);
        }else{
            toastr.error(res.data['message']);
        }
    }
</script>