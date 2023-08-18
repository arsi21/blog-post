<form method="get" action="{{ route('home') }}" class="d-flex" role="search">
    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" value="{{request()->input('search')}}">
    <button class="btn btn-success" type="submit">Search</button>
</form>