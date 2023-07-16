<div class="position-absolute top-0 start-50 translate-middle-x" style="margin-top: 75px;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </div>
    </div>
  </div>

</div>