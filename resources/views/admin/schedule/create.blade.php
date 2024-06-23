<x-admin>
    @section('title', 'Create Schedule')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create User</h3>
            <div class="card-tools"><a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-dark">Back</a></div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.schedule.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="title" class="form-label">Title:*</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="Description" class="form-label">Description:</label>
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="Email" class="form-label">Day start:</label>
                            <input type="date" class="form-control" name="start_time" required>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="Email" class="form-label">Day end:</label>
                            <input type="date" class="form-control" name="end_time" required>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="Email" class="form-label">Status:</label>
                            {{-- <input type="sele" > --}}
                            <select name="status" class="form-control" name="status" required>
                                <option value="wait">wait</option>
                                <option value="done">done</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $groupId }}" name="group_id">
                    <div class="col-lg-12">
                        <div class="float-right">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin>
