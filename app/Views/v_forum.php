<!-- Filter Bar -->
<div class="container-fluid p-3" style="background-color: transparent; margin-top: 10vh;">
    <div class="row justify-content-center d-flex align-items-center">
        <div class="col">
            <button class="btn btn-primary" onclick="showConversations()">Conversations</button>
        </div>
    </div>
</div>

<!-- Content -->
<div class="container mt-3">
    <div class="row">
        <!-- Conversation Column -->
        <div class="col-md-8">
            <!-- Forum Box (Sample) -->
            <?php foreach ($forum as $data) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" alt="Profile Picture" class="rounded-circle me-3">
                            <div>
                                <!-- <h5 class="card-title"><?= $data['username']; ?></h5> -->
                                <p class="card-text my-1"><?= $data['inner']; ?></p>
                                <p class="card-text my-1">- <?= $data['username']; ?></p>
                                <p class="card-text my-1 text-muted">
                                    <!-- Icon komentar -->
                                    <a href="<?= base_url('/viewforum/'.$data['id_forum']); ?>" style="text-decoration: none !important;" class="me-1 text-dark"><span class="text-decoration-underline fw-bold">See Forum</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- More Forum Boxes go here -->
        </div>

        <!-- Help Others Column -->
        <div class="col-md-4">
            <!-- Chat Box (Sample) -->
            <?php if(session()->get('login')) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Write a forum...</h5>
                    <form method="post" action="<?= base_url('/foruminsert'); ?>">
                        <textarea class="form-control mb-3" rows="4" name="inner"></textarea>
                        <input type="hidden" name="id_user" value="<?= session()->get('id_user'); ?>">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
            <?php endif; ?>
            <!-- Top Creators (Sample) -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top Creators</h5>
                    <ul class="list-unstyled">
                        <li>miqitiy</li>
                        <li>Baro</li>
                        <!-- More top creators go here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    function showConversations() {
        // Implement logic to show conversations
        console.log('Showing conversations...');
    }

    function showHelpOthers() {
        // Implement logic to show help others page
        console.log('Showing help others page...');
    }

    function showCategories() {
        // Implement logic to show categories page
        console.log('Showing categories page...');
    }

    // Fungsi untuk menampilkan/menyembunyikan komentar
    function toggleComments(event) {
        event.preventDefault();
        let comments = event.target.parentElement.parentElement.nextElementSibling;
        comments.style.display = comments.style.display === 'none' ? 'block' : 'none';
    }
</script>