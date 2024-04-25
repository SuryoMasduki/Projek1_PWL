<div class="modal fade" id="showAllCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Showing all course</h5>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Credit</th>
                        <th>Action</th>
                    </tr>
                    @for ($i = 0; $i < count($departmentCourses); $i++) 
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $departmentCourses[$i]->name }}</td>
                            <td>{{ $departmentCourses[$i]->code }}</td>
                            <td>{{ $departmentCourses[$i]->credit }}</td>
                            <td>
                                <form action="{{ route('addCourse', ['course' => $departmentCourses[$i]->id]) }}" method="POST">
                                    @csrf
                                    <button>Add</button>
                                </form>
                            </td>
                            </tr>
                        @endfor
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>