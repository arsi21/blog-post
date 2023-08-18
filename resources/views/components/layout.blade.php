
  @include('partials._header')
  @include('partials._nav')

  <div class="container mb-5">
    {{$slot}}
  </div>

  @include('partials._footer')