@props(['jobid'])
<!-- Modal For Biding-->
<div class="modal fade" id="bidModal" tabindex="-1" aria-labelledby="bidModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bidModalLabel">Bid on Job</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/labour/bid')}}">
                    @csrf
                    <label class="form-label">Place your Bid</label>
                    <!-- Rating input -->
                    <div class="form-outline mb-4">
                        <input type="hidden" name="job_id" value="{{$jobid}}" />
                        <input type="number" id="bid" name="bid" class="form-control" min="0" required />
                        <label class="form-label" for="bid">Add your Bid</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Your Bid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>