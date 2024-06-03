<section style="margin-top: 15vh">
    <div class="container">
        <div class="row gap-4">
            <div class="col-12">
                <a href="<?= base_url('/forum'); ?>" class="btn-outline-dark btn py-2 rounded-circle mb-4"><i class="bi bi-arrow-left"></i></a>
                <?php //foreach ($data as $d) : 
                ?>
                <div class="border rounded shadow-sm bg-white p-3">
                    <p class="my-4"><?= $data[0]['inner']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">- <?= $data[0]['username']; ?></p>
                        <p class="mb-0"><?= date('d M Y', strtotime($data[0]['tanggal_posting'])); ?></p>
                    </div>
                </div>
                <?php //endforeach; 
                ?>
            </div>
            <hr>
            <?php if(session()->get('login')): ?>
            <div class="col-12">
                <div class="border rounded shadow-sm bg-white p-3">
                    <form action="<?= base_url('/reply'); ?>" method="post">
                        <div>
                            <label for="reply" class="form-label mb-2">Write your reply</label>
                            <textarea class="form-control mb-4" id="reply" name="reply" type="text"> </textarea>
                            <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                            <input type="hidden" name="id_forum" value="<?= $data[0]['id_forum']; ?>">
                            <button type="submit" class="btn btn-primary">Post</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <?php foreach($reply as $d): ?>
            <div class="col-12">
                <div class="border rounded shadow-sm bg-white p-3">
                    <p class="my-4"><?= $d['reply']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-0">- <?= $d['username']; ?></p>
                        <p class="mb-0"><?= date('d M Y', strtotime($d['tanggal_reply'])); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>