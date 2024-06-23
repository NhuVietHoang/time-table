<x-admin>
    @section('title', 'Group')
    <div class="row justify-content-center">
        <div class="container">
            <div class="alert alert-info">
                <h4>No groups found</h4>
                <p>There are currently no groups to display.</p>
                <a href="{{ route('admin.group.create') }}" class="btn btn-sm btn-primary" style="text-decoration: none">Create</a>
            </div>
        </div>
    </div>
</x-admin>
