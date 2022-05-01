
<training-form :recruteur="{{ json_encode($recruteur) }}" />

@push('scripts')
    <script>
        $('body').on('change', '#photo_upload', function(e) {
            let val = $(this).val().trim();
            if (val && val !== "") {
                $('.choosePhoto').addClass('d-none');
                $('.photoChoosed').removeClass('d-none');
            } else {
                $('.photoChoosed').addClass('d-none');
                $('.choosePhoto').removeClass('d-none');
            }
        });
    </script>
@endPush
