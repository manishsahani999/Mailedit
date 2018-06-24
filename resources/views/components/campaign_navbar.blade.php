<nav class="navbar navbar-expand-lg sec-navbar navbar-light bg-light sticky-top">
    <div class="navbar-item ml-5">
        <img src="{{ asset('img/email_sec.png') }}" alt="">
        <span class="ml-2">Let's get started</span>
    </div>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a href="{{ route('brand.show', $brand->slug) }}" class="btn bt">go back</a>
        </li>
        <li class="navbar-item ml-1">
            <button class="btn btn-white bt" name="status" value="draft">Save as draft</button>
        </li>
        <li class="navbar-item ml-1">
            <button class="btn btn-primary bt" name="content">Design Campaign and send</button>
        </li>
    </ul>
</nav>