@php return; /** TODO fix gids */ @endphp
<fieldset class="mb-3" id="fieldset-permissions">

    <legend>{{ __('Permissions') }}</legend>

    <fieldset class="fieldset-advanced">

        <div class="row">
            <div class="col">
                <fieldset>
                    <label for="form-input-gids">
                        <i class="fa-solid fa-people-group text-info"></i>
                        {{ __('Groups') }}
                    </label>
                    <select class="form-select" id="form-input-gids" name="gids[]" multiple aria-label="Select groups">
                        <option {{ empty(old('po')) ? 'selected' : '' }}></option>
                        <option value="1" {{ intval(old('po')) & 1 ? 'selected' : '' }}>{{ __('Admin') }}
                        </option>
                        <option value="2" {{ intval(old('po')) & 2 ? 'selected' : '' }}>{{ __('Guest') }}
                        </option>
                        <option value="4" {{ intval(old('po')) & 4 ? 'selected' : '' }}>{{ __('Staff') }}
                        </option>
                        <option value="8" {{ intval(old('po')) & 8 ? 'selected' : '' }}>{{ __('Users') }}
                        </option>
                    </select>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>
                    <p>
                        <i class="fa-solid fa-house-user text-info"></i>
                        {{ __('Owner Permissions') }}
                    </p>
                    <input type="hidden" name="po" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_po_read" name="po[read]"
                            value="4" {{ intval(old('po')) & 4 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_po_read">
                            {{ __('Read') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_po_write" name="po[write]"
                            value="2" {{ intval(old('po')) & 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_po_write">
                            {{ __('Write') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_po_execute" name="po[execute]"
                            value="1" {{ intval(old('po')) & 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_po_execute">
                            {{ __('Execute') }}
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>
                    <p>
                        <i class="fa-solid fa-people-roof text-info"></i>
                        {{ __('Group Permissions') }}
                    </p>
                    <input type="hidden" name="pg" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_pg_read" name="pg[read]"
                            value="4" {{ intval(old('pg')) & 4 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_pg_read">
                            {{ __('Read') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_pg_write" name="pg[write]"
                            value="2" {{ intval(old('pg')) & 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_pg_write">
                            {{ __('Write') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_pg_execute" name="pg[execute]"
                            value="1" {{ intval(old('pg')) & 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_pg_execute">
                            {{ __('Execute') }}
                        </label>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                <fieldset>
                    <p>
                        <i class="fa-solid fa-globe text-info"></i>
                        {{ __('World Permissions') }}
                    </p>
                    <input type="hidden" name="pw" value="0">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_pw_read" name="pw[read]"
                            value="4" {{ intval(old('pw')) & 4 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_pw_read">
                            {{ __('Read') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_pw_write" name="pw[write]"
                            value="2" {{ intval(old('pw')) & 2 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_pw_write">
                            {{ __('Write') }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="permissions_pw_execute" name="pw[execute]"
                            value="1" {{ intval(old('pw')) & 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="permissions_pw_execute">
                            {{ __('Execute') }}
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>

        <legend class="text-warning">Access</legend>

        <div class="row">
            <div class="col">
                <div class="form-check form-check-inline">
                    <input type="hidden" name="locked" value="0">
                    <input class="form-check-input" type="checkbox" id="form-input-locked" name="locked"
                        value="1" {{ $data->locked ? 'checked' : '' }}>
                    <label class="form-check-label" for="form-input-locked">
                        <i class="fa-solid fa-lock text-warning"></i>
                        {{ __('Locked') }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="only_admin" value="0">
                    <input class="form-check-input" type="checkbox" id="form-input-only_admin" name="only_admin"
                        value="1" {{ old('only_admin') ? 'checked' : '' }}>
                    <label class="form-check-label" for="form-input-only_admin">
                        <i class="fa-solid fa-user-gear text-info"></i>
                        {{ __('Only Admin') }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="only_user" value="0">
                    <input class="form-check-input" type="checkbox" id="form-input-only_user" name="only_user"
                        value="1" {{ old('only_user') ? 'checked' : '' }}>
                    <label class="form-check-label" for="form-input-only_user">
                        <i class="fa-solid fa-user text-info"></i>
                        {{ __('Only User') }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="only_guest" value="0">
                    <input class="form-check-input" type="checkbox" id="form-input-only_guest" name="only_guest"
                        value="1" {{ old('only_guest') ? 'checked' : '' }}>
                    <label class="form-check-label" for="form-input-only_guest">
                        <i class="fa-solid fa-person-rays text-info"></i>
                        {{ __('Only Guest') }}
                    </label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input type="hidden" name="allow_public" value="0">
                    <input class="form-check-input" type="checkbox" id="form-input-allow_public" name="allow_public"
                        value="1" {{ old('allow_public') ? 'checked' : '' }}>
                    <label class="form-check-label" for="form-input-allow_public">
                        <i class="fa-solid fa-users-line text-info"></i>
                        {{ __('Allow Public') }}
                    </label>
                </div>
            </div>
        </div>
    </fieldset>

    @yield('fieldset-permissions')

</fieldset>
