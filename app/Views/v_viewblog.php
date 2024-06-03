<section style="margin-top: 12vh">
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="border shadow-sm rounded m-3 p-4 d-flex flex-column gap-2" style="background-color: #FAF9F6;">
                        <img src="<?= base_url('/image/' . $data[0]['id_blog']); ?>" class="img-fluid rounded-top" alt="Blog Image">
                        <span class="d-flex justify-content-between align-items-center">
                            <h1 class="fw-bold mb-0"><?= $data[0]['judul']; ?></h1>
                            <span class="d-flex flex-column align-items-start">
                                <p class="text-secondary mb-0"><?= $data[0]['username']; ?></p>
                                <p class="text-secondary mb-0"><?= date('d M Y', strtotime($data[0]['tanggal'])); ?></p>
                            </span>
                        </span>
                        <p>
                            <?= $data[0]['isi']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>