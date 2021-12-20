<?= $this->extend('template/index'); ?>
<?= $this->section('content'); ?>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <!-- Navbar -->
    <?= $this->include('pages/navbar'); ?>


    <!-- Section List -->

    <!-- Home Section -->
    <?= $this->include('pages/section/home-section'); ?>

    <!-- Service Section -->
    <?= $this->include('pages/section/services-section'); ?>

    <!-- Destination Section -->
    <?= $this->include('pages/section/destination-section'); ?>

    <!-- Destination Choice Section -->
    <?= $this->include('pages/section/destination-choice'); ?>

    <!-- Hotel Section -->
    <?= $this->include('pages/section/hotel-section'); ?>


    <!-- Testimony Section -->
    <?= $this->include('pages/section/testimony-section'); ?>

    <!-- Restaurant Section -->
    <?= $this->include('pages/section/restaurant-section'); ?>


    <!-- Contact Section -->
    <?= $this->include('pages/section/contact-section'); ?>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
        <div id="map" class="bg-white"></div>
    </section>

    <!-- Gallery Section -->
    <?= $this->include('pages/section/gallery-section'); ?>

    <!-- End of Section -->

    <!-- Footer -->
    <?= $this->include('pages/footer/footer'); ?>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <?= $this->endSection(); ?>