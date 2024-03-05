<fieldset class="mb-3">

    <legend>{{ __('Information') }}</legend>

    @if ($withFormLabel)
    <x-playground::forms.column column="label" label="Label" :autocomplete="false" :rules="[
        'required' => $withFormLabelRequired,
        'maxlength' => 255,
    ]">
    </x-playground::forms.column>
    @endif

    @if ($withFormTitle)
    <x-playground::forms.column column="title" label="Title" :autocomplete="false" :rules="[
        'required' => $withFormTitleRequired,
        'maxlength' => 255,
    ]">
    </x-playground::forms.column>
    @endif

    @if ($withFormSlug)
    <x-playground::forms.column column="slug" label="SLUG" :autocomplete="false" :rules="[
        'required' => !empty($_method) && 'patch' === $_method,
        'maxlength' => 255,
    ]" />
    @endif

    @if ($withFormParent && !empty($parents))
    <x-playground::forms.column-select column="parent_id" :key="$meta['info']['model_attribute']" label="Parent Setting" :records="$parents" />
    @endif

    @yield('fieldset-information')

</fieldset>
