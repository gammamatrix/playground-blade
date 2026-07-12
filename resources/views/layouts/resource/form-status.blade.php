<fieldset class="mb-3" id="fieldset-status">
    <legend>{{ __("Status") }}</legend>

    <fieldset>
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-rank" class="form-label">
                        {{ __("Rank") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-rank"
                        name="rank"
                        value="{{ old("rank") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-size" class="form-label">
                        {{ __("Size") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-size"
                        name="size"
                        value="{{ old("size") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-status" class="form-label">
                        {{ __("Status") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-status"
                        name="status"
                        value="{{ old("status") }}"
                        min="0"
                    />
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend class="text-warning">Access</legend>

        <div class="row">
            <div class="col">
                <div class="form-check form-check-inline">
                    <input type="hidden" name="locked" value="0" />
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="form-input-locked"
                        name="locked"
                        value="1"
                        {{ $data->locked ? "checked" : "" }}
                    />
                    <label class="form-check-label" for="form-input-locked">
                        <i class="fa-solid fa-lock text-warning"></i>
                        {{ __("Locked") }}
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    @yield("fieldset-status")
</fieldset>
