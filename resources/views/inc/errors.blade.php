@if ($errors->any())
<div class="notification  pos-right pos-top" data-animation="from-top" data-autoshow="200">
    <div class="boxed boxed--border border--round box-shadow">
        <div class="text-block">
            <h5>Errors</h5>
            <ul>
                @foreach ($errors->all() as $error)
                <li><strong>{{ $error }}</strong></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif