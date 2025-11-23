<fieldset class="mb-3" id="fieldset-matrix">
    <legend>{{ __("Matrix") }}</legend>

    <fieldset class="fieldset-advanced">
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-x" class="form-label">
                        {{ __("x") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-x"
                        name="x"
                        step="1"
                        value="{{ old("x") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-y" class="form-label">
                        {{ __("y") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-y"
                        name="y"
                        step="1"
                        value="{{ old("y") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-z" class="form-label">
                        {{ __("z") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-z"
                        name="z"
                        step="1"
                        value="{{ old("z") }}"
                    />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-r" class="form-label">
                        {{ __("r") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-r"
                        name="r"
                        step="any"
                        value="{{ old("r") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-theta" class="form-label">
                        {{ __("theta") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-theta"
                        name="theta"
                        step="any"
                        value="{{ old("theta") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-rho" class="form-label">
                        {{ __("rho") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-rho"
                        name="rho"
                        step="any"
                        value="{{ old("rho") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-phi" class="form-label">
                        {{ __("phi") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-phi"
                        name="phi"
                        step="any"
                        value="{{ old("phi") }}"
                    />
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-elevation" class="form-label">
                        {{ __("Elevation") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-elevation"
                        name="elevation"
                        step="any"
                        value="{{ old("elevation") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-latitude" class="form-label">
                        {{ __("Latitude") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-latitude"
                        name="latitude"
                        min="-90"
                        max="90"
                        step="any"
                        value="{{ old("latitude") }}"
                    />
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-longitude" class="form-label">
                        {{ __("Longitude") }}
                    </label>
                    <input
                        type="number"
                        class="form-control"
                        id="form-input-longitude"
                        name="longitude"
                        min="-180"
                        max="180"
                        step="any"
                        value="{{ old("longitude") }}"
                    />
                </div>
            </div>
        </div>
    </fieldset>

    @yield("fieldset-matrix")
</fieldset>
