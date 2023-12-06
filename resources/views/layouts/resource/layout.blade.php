<?php
/**
 * Resource Layout
 *
 *
 * resources/views/layouts/resource/layout.blade.php
 *
 */

$package_config = config('playground-blade');

?>
@extends($package_config['layout'])
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            @yield('section-primary')

            @yield('section-secondary')

        </div>
    </div>
@endsection
