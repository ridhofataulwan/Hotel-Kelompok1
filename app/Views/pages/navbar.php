<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Ecoland</a>
        <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav nav ml-auto">
                <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                <li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
                <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                <li class="nav-item"><a href="#destination-section" class="nav-link"><span>Destination</span></a></li>
                <li class="nav-item"><a href="#hotel-section" class="nav-link"><span>Hotel</span></a></li>
                <li class="nav-item"><a href="#restaurant-section" class="nav-link"><span>Restaurant</span></a></li>
                <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                <?php if (logged_in() == true) : ?>
                    <div class="dropdown">
                        <li class="nav-item">
                            <button class="btn dropdown-toggle mt-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="font-semibold ">
                                <?= user()->username; ?>
                                </span>
                            </button>
                        </li>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item text-rose-300" href="#">Profile</a></li>
                            <li><a class="dropdown-item text-rose-300" href="#">Settings</a></li>
                            <li><a class="dropdown-item text-rose-300" href="<?= base_url();?>/logout">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <li class="nav-item"><a href="<?= base_url(); ?>/login" class="nav-link"><span>Login</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>