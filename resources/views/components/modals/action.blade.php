<!-- Modal For Action of Admin-->
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="actionModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/admin/action')}}">
                    @csrf
                    <label class="form-label"> Approval for Job</label>
                    <!-- Approval input -->
                    <div class="input-group">
                        <div class="input-group-text">Job</div>
                        <select class="select" id="job" name="job">
                            <option value=""></option>
                            <option value="Approve">Approve</option>
                            <option value="Remove">Remove</option>
                            <option value="Block">Corporate</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>