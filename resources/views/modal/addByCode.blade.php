<div class="modal fade" id="addByCode" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Insert Course Code</h5>
            </div>
            <form action="{{ route('addCourseByCode') }}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <label>
                        <input type="text" name="courseCode">
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn button-submit">Add Course</button>
                </div>
            </form>
        </div>
    </div>
</div>