<nav class="navbar navbar-expand-lg bg-body-tertiary">

    <div class="container-fluid pb-3">

        <a class="navbar-brand" href="#">Navbar scroll</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">

            <ul class="navbar-nav mx-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                <?php

                    echo generateMenuHiarchy();

                ?>

            </ul>

        </div>

        <form class="d-flex" role="search">

            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">

            <button class="btn btn-outline-success" type="submit">Search</button>

        </form>

    </div>

</nav>
