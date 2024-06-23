<x-admin>
    @section('title', 'Group')
    <div class="col-md">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Document
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @foreach ($documents as $document)
                    <ul>
                        <li><a href="http://localhost/storage/uploads/{{ $document->name }}">{{ $document->name }}</a>
                        </li>
                    </ul>
                @endforeach

            </div>
            <div class="card-footer clearfix">
                <form action="{{ route('admin.uploadDocument') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" id="myFile" name="filename">
                    <input type="hidden" value="{{ $id }}" name="group_id">
                    <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i>Add File</button>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="ion ion-clipboard mr-1"></i>
                Schedule
            </h3>

            <div class="card-tools">
                <ul class="pagination pagination-sm">
                    <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                </ul>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <ul class="todo-list" data-widget="todo-list">
                @foreach ($schedules as $schedule)
                    <li @if ($schedule->status == 'done') class="done" @endif>
                        <span class="handle">
                            <i class="fas fa-ellipsis-v"></i>
                            <i class="fas fa-ellipsis-v"></i>
                        </span>
                        {{-- <div class="icheck-primary d-inline ml-2">
                            <input type="checkbox" value="" name="todo6" id="{{ $schedule->id }}">
                            <label for="{{ $schedule->id }}"></label>
                        </div> --}}
                        <span class="text">{{ $schedule->title }}</span>
                        <small class="badge badge-secondary"><i
                                class="far fa-clock"></i>{{ $schedule->start_time . '-' . $schedule->end_time }}</small>
                        <div class="tools">
                            <i class="fas fa-edit"></i>
                            <i class="fas fa-trash-o"></i>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <button type="button" class="btn btn-info float-right"><a
                    href="{{ route('admin.schedule.create', $id) }}"><i class="fas fa-plus"></i> Add item</a></button>
        </div>
    </div>

    <!-- /.todo-list -->
    <div class="card">
        <div class="content-wrapper kanban" style="display: contents">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1>Task</h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content pb-3">
                <div class="container-fluid h-100">
                    <div class="card card-row card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Backlog
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Create Labels</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#3</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1"
                                            disabled>
                                        <label for="customCheckbox1" class="custom-control-label">Bug</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox2"
                                            disabled>
                                        <label for="customCheckbox2" class="custom-control-label">Feature</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox3"
                                            disabled>
                                        <label for="customCheckbox3" class="custom-control-label">Enhancement</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox4"
                                            disabled>
                                        <label for="customCheckbox4"
                                            class="custom-control-label">Documentation</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox5"
                                            disabled>
                                        <label for="customCheckbox5" class="custom-control-label">Examples</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Create Issue template</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#4</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1_1"
                                            disabled>
                                        <label for="customCheckbox1_1" class="custom-control-label">Bug Report</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" id="customCheckbox1_2"
                                            disabled>
                                        <label for="customCheckbox1_2" class="custom-control-label">Feature
                                            Request</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Create PR template</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#6</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-light card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Create Actions</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#7</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                        Aenean commodo ligula eget dolor. Aenean massa.
                                        Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-row card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                To Do
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Create first milestone</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#5</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-row card-default">
                        <div class="card-header bg-info">
                            <h3 class="card-title">
                                In Progress
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-light card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Update Readme</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#2</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                        Aenean commodo ligula eget dolor. Aenean massa.
                                        Cum sociis natoque penatibus et magnis dis parturient montes,
                                        nascetur ridiculus mus.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-row card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                                Done
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="card-title">Create repo</h5>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-link">#1</a>
                                        <a href="#" class="btn btn-tool">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="card-footer clearfix">
            <button type="button" class="btn btn-info float-right"><a
                    href="{{ route('admin.task.create', $id) }}"><i class="fas fa-plus"></i> Add item</a></button>
        </div>
    </div>


</x-admin>
