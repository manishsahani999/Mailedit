@if (Session::has('success'))

<div class="notification pos-right pos-top custom__notification" data-animation="from-top" data-autoshow="200">
    <div class="boxed boxed--border border--round box-shadow">
        <div class="text-block">
            <h5>Notification</h5>
            <p>
                {{ Session::get('success') }}
            </p>
        </div>
    </div>
</div>

@endif