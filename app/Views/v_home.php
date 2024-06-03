<section class="hero">
    <style>
        .hero {
            height: 100vh;
        }

        @media screen and (max-width: 768px) {
            .hero {
                height: 70vmin;
            }
        }
    </style>

    <div id="carouselhero" class="carousel slide h-100">
        <div class="carousel-inner h-100">
            <?php for ($n = 1; $n <= $files; $n++) : ?>
                <div class="carousel-item <?= ($n == 1) ? 'active' : ''; ?>" style="
                background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 70%, rgba(255, 255, 255, 1)), url(<?= base_url("/img/carousel/$n.jpg"); ?>);
                background-size: cover; 
                background-repeat: no-repeat; 
                background-position: center;
                height: 100%;
                ">
                    <p class="opacity-0">.</p>
                </div>
            <?php endfor ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselhero" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselhero" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


</section>

<section class="mt-5">
    <div class="container d-flex flex-column gap-3">

        <div class="row justify-content-center">
            <h3 class="fw-bold text-center">Welcome Tech-Enthusiast!</h3>
        </div>

        <div class="row justify-content-center">
            <div class="col-9 text-center d-flex flex-column gap-2">
                <p>
                    Dias Mechanon adalah platform yang berfokus pada eksplorasi potensi AI untuk keberlanjutan. Ini menyediakan sumber daya informatif, alat kolaboratif, dan edukasi bagi berbagai kalangan yang tertarik dengan penerapan teknologi AI dalam mendukung keberlanjutan. Dias Mechanon membantu pengguna memahami dan memanfaatkan AI untuk menghadapi tantangan lingkungan, sosial, dan ekonomi. Melalui berbagai konten edukatif dan alat inovatif, platform ini mendorong kolaborasi antara peneliti, praktisi, dan penggiat keberlanjutan untuk menciptakan solusi AI yang berdampak positif bagi masa depan.
                </p>
            </div>
        </div>
    </div>
</section>
<style>
    .custom-shape-divider-top-1708678655 {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
    }

    .custom-shape-divider-top-1708678655 svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 79px;
    }

    .custom-shape-divider-top-1708678655 .shape-fill {
        fill: #FFFFFF;
    }
</style>
<section class="p-5 mt-5" style="
background-color:  #f6f4ee;
position: relative;
/* background: #56ab2f;
background: -webkit-linear-gradient(to right, #a8e063, #56ab2f); 
background: linear-gradient(to right, #a8e063, #56ab2f); */
">
    <div class="custom-shape-divider-top-1708678655">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex align-items-baseline w-100 justify-content-center">
                <h2 class="fw-bold" style="text-shadow: 2px 2px 2px white">Recent Community Posts</h2>
            </div>
        </div>
        <div class="row align-items-stretch justify-content-around gap-2 mt-3">
            <?php foreach($post as $data) : ?>
                <div class="col-12 bg-white shadow-lg rounded py-3 px-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column" style="overflow: hidden;">
                        <h4 class="mb-0 fw-bold"><?= $data['judul']; ?></h4>
                        <div class="clamp w-75">
                            <p class="" style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden;"><?= $data['isi']; ?></p>
                        </div>
                        <p class="text-secondary mb-0"><?= date('d M Y', strtotime($data['tanggal'])); ?></p>
                    </div>
                    <div>
                        <a href="<?= base_url('/viewblog/'.$data['id_blog']); ?>" class="hover">
                            <h1 class="mb-0 text-dark"><i class="bi bi-arrow-right-circle-fill"></i></h1>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>