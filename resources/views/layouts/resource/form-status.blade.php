<fieldset class="mb-3" id="fieldset-status">

    <legend>{{ __('Status') }}</legend>

    <fieldset>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-rank" class="form-label">
                        {{ __('Rank') }}
                    </label>
                    <input type="number" class="form-control" id="form-input-rank" name="rank" value="{{ old('rank') }}">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-size" class="form-label">
                        {{ __('Size') }}
                    </label>
                    <input type="number" class="form-control" id="form-input-size" name="size" value="{{ old('size') }}">
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="form-input-status" class="form-label">
                        {{ __('Status') }}
                    </label>
                    <input type="number" class="form-control" id="form-input-status" name="status" value="{{ old('status') }}" min="0">
                </div>
            </div>
        </div>

    </fieldset>

    @yield('fieldset-status')

</fieldset>
