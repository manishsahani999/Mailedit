@if ($errors->any())
    @foreach ($errors->all() as $error)
    <?php
        Toastr()->error('Error', $error, ["positionClass" => "toast-bottom-right"]);
    ?>
    @endforeach
@endif