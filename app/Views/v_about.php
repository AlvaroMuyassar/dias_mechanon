    <style>
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .wave {
            position: relative;
            height: 40px;
            background: rgb(47, 1, 232);
        }

        .wave::after {
            content: "";
            position: absolute;
            border-radius: 100%;
            width: 100%;
            height: 300px;
            background-color: rgb(47, 1, 232);
            left: -25%;
            top: -240px;
            clip-path: ellipse(100% 15% at -15% 100%);
        }

        .about-section {
            background: rgb(47, 1, 232);
            color: white;
            padding: 100px 0 60px 0;
            position: relative;
        }

        .team-section h2::after {
            content: "";
            display: block;
            width: 100px;
            height: 3px;
            background: gray;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .card img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-top: -50px;
        }
    </style>

    <div class="about-section text-center">
        <div class="container">
            <h1>Dias Mechanon</h1>
            <p class="lead">Dias Mechanon adalah platform inovatif yang menyediakan solusi teknologi canggih untuk kebutuhan industri modern. Kami berkomitmen untuk memberikan layanan terbaik kepada klien kami dengan teknologi terbaru dan tim ahli yang berpengalaman.</p>
        </div>
    </div>

    <div class="wave"></div>

    <div class="team-section py-5">
        <div class="container text-center">
            <h2>Tim Kami</h2>
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="card-img-top mx-auto" alt="Profile Photo 1">
                        <div class="card-body">
                            <h5 class="card-title">Fajar Shadiq Saputra</h5>
                            <p class="card-text">Project Manager</p>
                            <p class="card-text">Mengawasi seluruh proyek dan memastikan semuanya berjalan lancar serta sesuai dengan jadwal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="card-img-top mx-auto" alt="Profile Photo 2">
                        <div class="card-body">
                            <h5 class="card-title">Alvaro Muyassar</h5>
                            <p class="card-text">Backend Developer</p>
                            <p class="card-text">Bertanggung jawab atas pengembangan dan implementasi backend website.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img src="https://www.w3schools.com/howto/img_avatar.png" class="card-img-top mx-auto" alt="Profile Photo 3">
                        <div class="card-body">
                            <h5 class="card-title">Muhammad Rafi Afriza</h5>
                            <p class="card-text">Frontend Developer</p>
                            <p class="card-text">Mendesain antarmuka pengguna yang intuitif dan menarik untuk memastikan pengalaman pengguna yang optimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>