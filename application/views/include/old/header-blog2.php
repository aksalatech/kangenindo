 <!-- Header -->
 <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <!-- LOGO -->
        <div class="logo">
            <a href="<?php echo base_url() ?>">
                <img class="logo-light" src="<?php echo base_url(); ?>image/<?php echo $config->logo_light; ?>" alt="<?php echo $config->title; ?>" />
                <img class="logo-dark dnone" src="<?php echo base_url(); ?>image/<?php echo $config->logo_dark; ?>" alt="<?php echo $config->title; ?>" />
            </a>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="<?php echo base_url() ?>" class="nav-link active">Back To Home</a>
            </li>
        </ul>
    </div>
</nav>