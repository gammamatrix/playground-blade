@php
    //return; /** TODO fix gids */
@endphp

<fieldset class="mb-3" id="fieldset-permissions">
    <legend>{{ __("Permissions") }}</legend>

    <fieldset class="fieldset-advanced">
        <div class="row">
            <div class="col">
                <fieldset>
                    <label for="form-input-gids">
                        <i class="fa-solid fa-people-group text-info"></i>
                        {{ __("Groups") }}
                    </label>
                    <select
                        class="form-select"
                        id="form-input-gids"
                        name="gids[]"
                        multiple
                        aria-label="Select groups"
                    >
                        <option
                            {{ empty(old("po")) ? "selected" : "" }}
                        ></option>
                        <option
                            value="1"
                            {{ intval(old("po")) & 1 ? "selected" : "" }}
                        >
                            {{ __("Admin") }}
                        </option>
                        <option
                            value="2"
                            {{ intval(old("po")) & 2 ? "selected" : "" }}
                        >
                            {{ __("Guest") }}
                        </option>
                        <option
                            value="4"
                            {{ intval(old("po")) & 4 ? "selected" : "" }}
                        >
                            {{ __("Staff") }}
                        </option>
                        <option
                            value="8"
                            {{ intval(old("po")) & 8 ? "selected" : "" }}
                        >
                            {{ __("Users") }}
                        </option>
                    </select>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>
                    <p>
                        <i class="fa-solid fa-house-user text-info"></i>
                        {{ __("Owner Permissions") }}
                    </p>
                    <input type="hidden" name="po" value="0" />
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_po_read"
                            name="po[read]"
                            value="4"
                            {{ intval(old("po")) & 4 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_po_read"
                        >
                            {{ __("Read") }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_po_write"
                            name="po[write]"
                            value="2"
                            {{ intval(old("po")) & 2 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_po_write"
                        >
                            {{ __("Write") }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_po_execute"
                            name="po[execute]"
                            value="1"
                            {{ intval(old("po")) & 1 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_po_execute"
                        >
                            {{ __("Execute") }}
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>
                    <p>
                        <i class="fa-solid fa-people-roof text-info"></i>
                        {{ __("Group Permissions") }}
                    </p>
                    <input type="hidden" name="pg" value="0" />
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_pg_read"
                            name="pg[read]"
                            value="4"
                            {{ intval(old("pg")) & 4 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_pg_read"
                        >
                            {{ __("Read") }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_pg_write"
                            name="pg[write]"
                            value="2"
                            {{ intval(old("pg")) & 2 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_pg_write"
                        >
                            {{ __("Write") }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_pg_execute"
                            name="pg[execute]"
                            value="1"
                            {{ intval(old("pg")) & 1 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_pg_execute"
                        >
                            {{ __("Execute") }}
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>
                    <p>
                        <i class="fa-solid fa-globe text-info"></i>
                        {{ __("World Permissions") }}
                    </p>
                    <input type="hidden" name="pw" value="0" />
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_pw_read"
                            name="pw[read]"
                            value="4"
                            {{ intval(old("pw")) & 4 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_pw_read"
                        >
                            {{ __("Read") }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_pw_write"
                            name="pw[write]"
                            value="2"
                            {{ intval(old("pw")) & 2 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_pw_write"
                        >
                            {{ __("Write") }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="permissions_pw_execute"
                            name="pw[execute]"
                            value="1"
                            {{ intval(old("pw")) & 1 ? "checked" : "" }}
                        />
                        <label
                            class="form-check-label"
                            for="permissions_pw_execute"
                        >
                            {{ __("Execute") }}
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>
    </fieldset>

    @yield("fieldset-permissions")
</fieldset>
