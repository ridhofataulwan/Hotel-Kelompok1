        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url(); ?>">Ecoland</a>
                <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav nav ml-auto">
                        <li class="nav-item"><a href="<?= base_url(); ?>#home-section" class="nav-link"><span>Home</span></a></li>
                        <?php if (logged_in() == true) : ?>
                            <div class="dropdown">
                                <li class="nav-item">
                                    <button class="btn dropdown-toggle mt-1 py-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="font-semibold ">
                                            Book
                                        </span>
                                    </button>
                                </li>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item text-rose-300" href="<?= base_url('Mybook/') ?>">My Book</a></li>
                                    <li><a class="dropdown-item text-rose-300" href="<?= base_url('Items/') ?>">All Hotels and Villas</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <li class="nav-item">
                                    <button class="btn dropdown-toggle mt-1" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="font-semibold ">
                                            <?= user()->username; ?>
                                        </span>
                                    </button>
                                </li>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item text-black" href="<?= base_url('/Profile'); ?>">Profile</a></li>
                                    <li><a class="dropdown-item text-black" href="<?= base_url('/logout'); ?>">Logout</a></li>
                                </ul>
                            </div>
                        <?php else : ?>
                            <li class="nav-item"><a href="<?= base_url(); ?>/login" class="nav-link"><span>Login</span></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>