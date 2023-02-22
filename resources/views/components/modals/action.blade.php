<!-- Modal For Action of Admin-->
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="actionModalLabel"></h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/admin/action')}}">
                    @csrf
                    <!-- Approval input -->
                    <div class="input-group col-12">
                        <div class="input-group-text col-3 text-capitalize" id="label"></div>
                        <select class="select col-9" id="action" name="action" required>
                        </select>
                        <input type="hidden" name="entity" id="entity" />
                        <input type="hidden" name="id" id="id" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>