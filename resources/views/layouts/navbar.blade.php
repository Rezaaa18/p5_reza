<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
        Suzuran
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Artikel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('tampil_eskul') }}">Ekskul</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('tampil_jurusan') }}">Jurusan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('tampil_fasilitas') }}">Fasilitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('tampil_industri') }}">Industri</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
