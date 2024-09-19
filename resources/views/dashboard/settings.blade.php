<x-dashboard.layout.layout title="Dashboard" bodyClass="">
    <div class="row mt-5">
        <div class="col-12 col-xl-12">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Settigns</h2>
                <form action="{{ route('admin.update.settings') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="mail_host">Mail Host</label>
                                <input class="form-control" id="mail_host" type="text"
                                    value="{{ $settings->where('type', 'MAIL_HOST')->first()->content }}"
                                    name="mail_host" required />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label for="mail_port">Mail Port</label>
                                <input class="form-control" id="mail_port" type="text" name="mail_port"
                                    value="{{ $settings->where('type', 'MAIL_PORT')->first()->content }}" required />
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12 mb-3">
                            <label for="mail_username">Mail Username</label>
                            <input class="form-control" id="mail_username" name="mail_username" type="text"
                                value="{{ $settings->where('type', 'MAIL_USERNAME')->first()->content }}" required />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="mail_password">Mail Password</label>
                                <input class="form-control" id="mail_password" type="text" name="mail_password"
                                    value="{{ $settings->where('type', 'MAIL_PASSWORD')->first()->content }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="mail_encryption">Mail Encryption</label>
                                <input class="form-control" id="mail_encryption" name="mail_encryption" type="text"
                                    value="{{ $settings->where('type', 'MAIL_ENCRYPTION')->first()->content }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="mail_from_address">Mail From Address</label>
                                <input class="form-control" id="mail_from_address" type="text"
                                    name="mail_from_address"
                                    value="{{ $settings->where('type', 'MAIL_FROM_ADDRESS')->first()->content }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="mail_from_name">Mail From Name</label>
                                <input class="form-control" id="mail_from_name" name="mail_from_name" type="text"
                                    value="{{ $settings->where('type', 'MAIL_FROM_NAME')->first()->content }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zoom_client_id">Zoom Client Id</label>
                                <input class="form-control" id="zoom_client_id" type="text" name="zoom_client_id"
                                    value="{{ $settings->where('type', 'ZOOM_CLIENT_ID')->first()->content }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zoom_client_secret">Zoom Client Secret</label>
                                <input class="form-control" id="zoom_client_secret" name="zoom_client_secret"
                                    type="text"
                                    value="{{ $settings->where('type', 'ZOOM_CLIENT_SECRET')->first()->content }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="form-group">
                                <label for="zoom_account_id">Zoom Account Id</label>
                                <input class="form-control" id="zoom_account_id" name="password_confirmation"
                                    type="text" placeholder="user202@#$%" {{ isset($admin) ? '' : 'required' }} />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="time_zone">Time Zone</label>
                                <input class="form-control" id="pass" type="text" name="time_zone"
                                    value="{{ $settings->where('type', 'time_zone')->first()->content }}" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="duration_of_meeting">Duration Of Meeting</label>
                                <input class="form-control" id="duration_of_meeting" name="duration_of_meeting"
                                    type="text"
                                    value="{{ $settings->where('type', 'duration_of_meeting')->first()->content }}" />
                            </div>
                        </div>

                    </div>

                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">
                            Update
                        </button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</x-dashboard.layout.layout>
