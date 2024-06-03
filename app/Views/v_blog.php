<div class="modal fade" id="modalpost" tabindex="-1" aria-labelledby="modalpostlabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalpostlabel">Post a New Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('/insert'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="blog" class="form-label">Postingan</label>
                        <textarea type="text" class="form-control" id="blog" rows="5" cols="50" style="overflow-y: scroll;" name="isi" required> </textarea>
                    </div>
                    <input value="<?= session()->get('id_user'); ?>" type="hidden" name="id_user">
                    <div class="mb-3">
                        <label for="image" class="form-label">Thumbnail (16:9)</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<section style="margin-top: 15vh;">
    <div class="container">
        <div class="row">
            <div class="d-flex mb-3 align-items-center justify-content-between">
                <div class="d-flex">
                    <?php if (session()->get('login')) : ?>
                        <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalpost">
                            <i class="bi bi-plus fw-bold me-2"></i>Create New Post
                        </a>
                    <?php endif; ?>
                    <p class="opacity-0">.</p>
                </div>
                <form class="d-flex justify-content-center">
                    <input type="email" placeholder="Search" class="form-control shadow-sm" id="search" name="keyword">
                </form>
            </div>
        </div>
            <div class="row align-items-stretch"><?php foreach ($blog as $data) : ?>
                <div class="col-3 mb-3">
                    <a href="<?= base_url("/viewblog/" . $data['id_blog']); ?>" class="hover">
                        <div class="bg-white rounded border shadow-sm d-flex flex-column gap-2 text-dark h-100">
                            <img src="<?= base_url('/image/' . $data['id_blog']); ?>" class="img-fluid rounded-top" alt="Blog Image">
                            <div class="p-2">
                                <div class="clamp w-100" style="white-space: nowrap; word-wrap: break-word; text-overflow: ellipsis; overflow: hidden;"><h3 class="text-decoration-none"><?= $data['judul']; ?></h3></div>
                                <div class="clamp w-100">
                                    <p class="text-decoration-none" style="white-space: nowrap; word-wrap: break-word; text-overflow: ellipsis; overflow: hidden;">
                                        <?= $data['isi']; ?>
                                    </p>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <p class="mb-0 text-secondary"><?= date('d M Y', strtotime($data['tanggal'])); ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?></div>
    </div>
</section>