<fieldset class="mb-3" id="fieldset-planning">

    <legend>{{ __('Planning') }}</legend>

    <div class="row">
        <div class="col">
            <x-playground::forms.column type="datetime-local" column="timer_start_at" label="Timer Start"/>
        </div>
        <div class="col">
            <x-playground::forms.column type="datetime-local" column="timer_end_at" label="Timer End"/>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-playground::forms.column type="datetime-local" column="planned_start_at" label="Planned Start"/>
        </div>
        <div class="col">
            <x-playground::forms.column type="datetime-local" column="planned_end_at" label="Planned End"/>
        </div>
        <div class="col">
            <x-playground::forms.column type="datetime-local" column="postponed_at" label="Postponed"/>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="planned" value="0">
                <input class="form-check-input" type="checkbox" id="status_planned" name="planned" value="1"
                    {{ old('planned') ? 'checked' : '' }}>
                <label class="form-check-label" for="status_planned">
                    <i class="fa-solid fa-circle-pause text-success"></i>
                    {{ __('Planned') }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="prioritized" value="0">
                <input class="form-check-input" type="checkbox" id="status_prioritized" name="prioritized"
                       value="1" {{ old('prioritized') ? 'checked' : '' }}>
                <label class="form-check-label" for="status_prioritized">
                    <i class="fa-solid fa-triangle-exclamation text-success"></i>
                    {{ __('Prioritized') }}
                </label>
            </div>
        </div>
    </div>

</fieldset>

@yield('fieldset-planning')

</fieldset>
