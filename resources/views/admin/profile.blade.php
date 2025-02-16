<x-admin-layout>
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6">
        <!-- Profile Header -->
        @include('components.profile.profile-header')

        <!-- Profile Details -->
        @include('components.profile.profile-details')

        <!-- Profile Update Form -->
        @include('components.profile.profile-update')
    </div>

    
</x-admin-layout>

<script>
    getUserData();
</script>