<div class="row">
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-body p-3">
                <h4 class="mb-0">Student Liasion Office Operation Management</h4>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-2">
            <div class="card-body p-0">
                <nav class="navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="#" class="nav-link">Student Liasion Office Manager</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Batch
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('batchType.create')}}">Add New Batch Type</a>
                                <a class="dropdown-item" href="{{route('batchType.index')}}">Batch Type List</a>
                                <!-- <a class="dropdown-item" href="/slo/batchType/edit">Edit Batch Type</a> -->
                                <a class="dropdown-item" href="{{route('batch.create')}}">Add New Batch</a>
                                <a class="dropdown-item" href="{{route('batch.index')}}">Batch List</a>
                                <!-- <a class="dropdown-item" href="/slo/batch/edit">Edit Batch</a> -->
                                <!-- <a class="dropdown-item" href="/academic/faculty/trash">Update Student Full Details</a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('idRange.index')}}" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ID Range
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('idRange.index')}}">ID Range List</a>
                                <a class="dropdown-item" href="{{route('idRange.create')}}">Add New Range</a>

                                <!-- <a class="dropdown-item" href="/academic/faculty/trash">Update Student Full Details</a> -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Student
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('register.create')}}">Add New Student</a>
                                <a class="dropdown-item" href="{{ route('register.index')}}">Update Student Full Details</a>
                                <a class="dropdown-item" href="{{ route('upload.index')}}">Student Upload Home</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Group
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/academic/department/create">Add New Group</a>
                                <a class="dropdown-item" href="/academic/department">List Departments</a>
                                <a class="dropdown-item" href="/academic/department/trash">List Departments in Trash</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admin
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('courseReq.index')}}">Course Requirements</a>
                                <a class="dropdown-item" href="{{route('hospital.index')}}">Hospitals</a>
                                <a class="dropdown-item" href="{{route('uploadCategory.index')}}">Upload Category</a>

                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

