<?php
include_once 'aa_test.php';
?>
<div>
    ok
    <hr>
    <hr>
    @php
        $nb2 = env('APP_MAX_NUMBER_OF_CHARS_IN_COMMENTS_FORM', 700);
    @endphp
    {{-- <x-gc7.helpers.form-textarea :charsNbLeft= 55 /> --}}
    <x-gc7.helpers.form-textarea :charsNbLeft= 77 />
    {{-- <x-gc7.sql /> --}}
</div>
