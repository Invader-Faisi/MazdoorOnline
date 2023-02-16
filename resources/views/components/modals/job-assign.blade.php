@props(['jobid', 'labourid'])
<!-- Modal For Biding-->
<div class="modal fade" id="assignModal" tabindex="-1" aria-labelledby="assignModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignModalLabel">Job Assignment</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('/employer/job/assign') }}">
                    @csrf
                    <p class="fw-bold h6 text-danger">Are you sure you want to assign the job !!!</p>
                    <input type="hidden" name="job_id" value="{{ $jobid }}" />
                    <input type="hidden" name="labour_id" value="{{ $labourid }}" />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
