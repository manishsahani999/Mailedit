@if (Session::has('success'))
    
    <div class="content is-success" role="alert">
      <strong>Success:</strong> {{ Session::get('success') }}
    </div>

@endif