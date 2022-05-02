
<training-form 
    :months="{{ json_encode($_months) }}" 
    :years="{{ json_encode($_years) }}" 
    :recruteur="{{ json_encode($recruteur) }}" 
/>

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
