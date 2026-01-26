<fieldset class="mb-3" id="fieldset-lifecycle">
    <legend>{{ __("Lifecycle") }}</legend>

    <div class="row">
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="canceled_at"
                label="Canceled"
            />
        </div>
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="closed_at"
                label="Closed"
            />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="canceled" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-canceled"
                    name="canceled"
                    value="1"
                    {{ old("canceled") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-canceled">
                    <i class="fa-solid fa-ban text-warning"></i>
                    {{ __("Canceled") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="completed" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-completed"
                    name="completed"
                    value="1"
                    {{ old("completed") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-completed">
                    <i class="fa-solid fa-check"></i>
                    {{ __("Completed") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="closed" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-closed"
                    name="closed"
                    value="1"
                    {{ old("closed") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-closed">
                    <i class="fa-solid fa-xmark text-info"></i>
                    {{ __("Closed") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="cron" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-cron"
                    name="cron"
                    value="1"
                    {{ old("cron") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-cron">
                    <i class="fa-regular fa-clock"></i>
                    {{ __("CRON") }}
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="duplicate" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-duplicate"
                    name="duplicate"
                    value="1"
                    {{ old("duplicate") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-duplicate">
                    <i class="fa-solid fa-clone"></i>
                    {{ __("Duplicate") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="fixed" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-fixed"
                    name="fixed"
                    value="1"
                    {{ old("fixed") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-fixed">
                    <i class="fa-solid fa-wrench text-success"></i>
                    {{ __("Fixed") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="internal" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-internal"
                    name="internal"
                    value="1"
                    {{ old("internal") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-internal">
                    <i class="fa-solid fa-clone"></i>
                    {{ __("Internal") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="flagged" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-flagged"
                    name="flagged"
                    value="1"
                    {{ old("flagged") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-flagged">
                    <i class="fa-solid fa-flag"></i>
                    {{ __("Flagged") }}
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="resolved_at"
                label="Resolved"
            />
        </div>
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="resumed_at"
                label="Resumed"
            />
        </div>
        <div class="col">
            <x-playground::forms.column
                type="datetime-local"
                column="suspended_at"
                label="Suspended"
            />
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="resolved" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-resolved"
                    name="resolved"
                    value="1"
                    {{ old("resolved") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-resolved">
                    <i class="fa-solid fa-check-double text-success"></i>
                    {{ __("Resolved") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="problem" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-problem"
                    name="problem"
                    value="1"
                    {{ old("problem") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-problem">
                    <i class="fa-solid fa-triangle-exclamation text-danger"></i>
                    {{ __("Problem") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="suspended" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-suspended"
                    name="suspended"
                    value="1"
                    {{ old("suspended") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-suspended">
                    <i class="fa-solid fa-hand text-warning"></i>
                    {{ __("Suspended") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="unknown" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-unknown"
                    name="unknown"
                    value="1"
                    {{ old("unknown") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-unknown">
                    <i class="fa-solid fa-question text-warning"></i>
                    {{ __("Unknown") }}
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="pending" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-pending"
                    name="pending"
                    value="1"
                    {{ old("pending") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-pending">
                    <i class="fa-solid fa-circle-pause text-warning"></i>
                    {{ __("Pending") }}
                </label>
            </div>
        </div>
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="retired" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-retired"
                    name="retired"
                    value="1"
                    {{ old("retired") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-retired">
                    <i class="fa-solid fa-chair text-info"></i>
                    {{ __("Retired") }}
                </label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="form-check form-check-inline">
                <input type="hidden" name="active" value="0" />
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="form-input-active"
                    name="active"
                    value="1"
                    {{ old("active") ? "checked" : "" }}
                />
                <label class="form-check-label" for="form-input-active">
                    <i class="fa-solid fa-person-running text-success"></i>
                    {{ __("Active") }}
                </label>
            </div>
        </div>
    </div>

    @yield("fieldset-lifecycle")
</fieldset>
