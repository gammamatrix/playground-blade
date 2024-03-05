<fieldset class="mb-3">

    <legend>{{ __('Status') }}</legend>

    <fieldset>

        <div class="row">
            <div class="col">
                <div class="form-check form-check-inline">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" id="status_active" name="active" value="1"
                        {{ $data->active ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_active">
                        <i class="fa-solid fa-person-running"></i>
                        {{ __('Active') }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-check-inline">
                    <input type="hidden" name="locked" value="0">
                    <input class="form-check-input" type="checkbox" id="status_locked" name="locked" value="1"
                        {{ $data->locked ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_locked">
                        <i class="fa-solid fa-lock text-warning"></i>
                        {{ __('Locked') }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-check-inline">
                    <input type="hidden" name="flagged" value="0">
                    <input class="form-check-input" type="checkbox" id="status_flagged" name="flagged" value="1"
                        {{ $data->flagged ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_flagged">
                        <i class="fa-solid fa-ban text-warning"></i>
                        {{ __('Flagged') }}
                    </label>
                </div>
            </div>
        </div>

    </fieldset>

    @yield('fieldset-status')

</fieldset>
