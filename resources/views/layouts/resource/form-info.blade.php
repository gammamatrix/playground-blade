<fieldset class="mb-3 fieldset-basic" id="fieldset-info">

    <legend>{{ __('Information') }}</legend>

    @if ($withFormTitle)
        <x-playground::forms.column column="title" label="Title" :autocomplete="false" :rules="[
            'required' => $withFormTitleRequired,
            'maxlength' => 255,
        ]">
        </x-playground::forms.column>
    @endif

    @if ($withFormLabel)
        <x-playground::forms.column column="label" label="Label" :autocomplete="false" :rules="[
            'required' => $withFormLabelRequired,
            'maxlength' => 255,
        ]">
        </x-playground::forms.column>
    @endif

    @if ($withFormSlug)
        <x-playground::forms.column column="slug" label="Slug" :autocomplete="false" :rules="[
            'required' => !empty($_method) && 'patch' === $_method,
            'maxlength' => 255,
        ]" />
    @endif

    @if ($withFormParent && !empty($parents))
        <x-playground::forms.column-select column="parent_id" :key="$packageInfo->model_attribute()" label="Parent Setting"
            :records="$parents" />
    @endif

    @yield('fieldset-info')

</fieldset>
