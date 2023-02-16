@props(['rating_by','rate'])

<!-- Modal For Rating-->
<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Rate {{$rate}}</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/rating')}}">
                    @csrf
                    <label class="form-label"> Rate Out of 5 </label>
                    <!-- Rating input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="ratings" name="ratings" class="form-control" max="5" min="0"
                            required />
                        <label class="form-label" for="ratings">{{$rate}} Rating</label>
                        <input type="hidden" name="rating_by" value="{{$rating_by}}">
                        <input type="hidden" name="ratedid" id="ratedid" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Rating</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>