<fieldset class="mb-3" id="fieldset-publishing">
    <legend>{{ __("Publishing") }}</legend>

    <div class="row">
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="embargo_at"
                label="Embargo Until"
            />
        </div>
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="published_at"
                label="Published"
            />
        </div>
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="released_at"
                label="Released"
            />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="published" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-published"
                    name="published"
                    value="1"
                    {{ old("published") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-published">
                    <i class="fa-solid fa-book text-success"></i>
                    {{ __("Published") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="released" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-released"
                    name="released"
                    value="1"
                    {{ old("released") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-released">
                    <i class="fa-solid fa-dove text-success"></i>
                    {{ __("Released") }}
                </label>
            </div>
        </div>
    </div>

    @yield("fieldset-publishing")
</fieldset>
