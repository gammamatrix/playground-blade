<fieldset class="mb-3" id="fieldset-permissions">
    <legend>{{ __("Content Permissions") }}</legend>

    <fieldset class="fieldset-advanced">
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
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="only_admin" value="0" />
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="form-input-only_admin"
                        name="only_admin"
                        value="1"
                        {{ old("only_admin") ? "checked" : "" }}
                    />
                    <label class="form-check-label" for="form-input-only_admin">
                        <i class="fa-solid fa-user-gear text-info"></i>
                        {{ __("Only Admin") }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="only_user" value="0" />
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="form-input-only_user"
                        name="only_user"
                        value="1"
                        {{ old("only_user") ? "checked" : "" }}
                    />
                    <label class="form-check-label" for="form-input-only_user">
                        <i class="fa-solid fa-user text-info"></i>
                        {{ __("Only User") }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="only_guest" value="0" />
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="form-input-only_guest"
                        name="only_guest"
                        value="1"
                        {{ old("only_guest") ? "checked" : "" }}
                    />
                    <label class="form-check-label" for="form-input-only_guest">
                        <i class="fa-solid fa-person-rays text-info"></i>
                        {{ __("Only Guest") }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="allow_public" value="0" />
                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="form-input-allow_public"
                        name="allow_public"
                        value="1"
                        {{ old("allow_public") ? "checked" : "" }}
                    />
                    <label
                        class="form-check-label"
                        for="form-input-allow_public"
                    >
                        <i class="fa-solid fa-users-line text-info"></i>
                        {{ __("Allow Public") }}
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    @yield("fieldset-content-permissions")
</fieldset>
