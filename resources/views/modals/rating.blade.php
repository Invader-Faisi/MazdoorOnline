<!-- Modal For Rating-->
<div class="modal fade" id="rateModal" tabindex="-1" aria-labelledby="rateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rateModalLabel">Employer Rating</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <label class="form-label"> Rate Out of 5 </label>
                    <!-- Rating input -->
                    <div class="form-outline mb-4">
                        <input type="number" id="EmployerRating" class="form-control" max="5" min="0" />
                        <label class="form-label" for="EmployerRating">Employer Rating</label>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Rating</button>
                </div>
            </div>
        </div>
    </div>
</div>
