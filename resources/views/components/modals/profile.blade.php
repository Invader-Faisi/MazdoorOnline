@props(['profile'])

<!-- Profile Update Modal-->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('/profile')}}">
                    @csrf
                    <!-- Name -->
                    <div class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control" value="{{ $profile->name }}"
                            required />
                        <label class="form-label" for="name">Full Name</label>
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" value="{{ $profile->email }}"
                            readonly />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Address input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="address" name="address" class="form-control"
                            value="{{ $profile->address }}" required />
                        <label class="form-label" for="address">Address</label>
                    </div>

                    <!-- Contact input -->
                    <div class="form-outline mb-4">
                        <input type="text" id="contact" name="contact" class="form-control"
                            value="{{ $profile->contact }}" required />
                        <label class="form-label" for="contact">Contact No</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" pattern=".{5,}"
                            required />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Saving Update -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>