<nav class="navbar navbar-expand-lg sec-navbar navbar-light bg-light sticky-top">
    <div class="navbar-item ml-5">
        <img src="{{ asset('img/email_sec.png') }}" alt="">
        <span class="ml-2">Let's get started</span>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a href="{{ route('brand.show', $brand->slug) }}" class="btn bt"> Go back all Campaigns</a>
        </li>
        <li class="navbar-item">
            <a class="btn btn-warning bt" href="#">Edit info</a>
        </li>
        <li class="navbar-item ml-1">
            <button class="btn btn-white bt" name="draft">Save as draft</button>
        </li>
        <li class="navbar-item ml-1">
            <button class="btn btn-primary bt" name="scheduled">Schedule or send</button>
        </li>
    </ul>
</nav>