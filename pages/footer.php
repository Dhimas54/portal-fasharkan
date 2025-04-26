<style>
    #vote-stats-footer {
        background-color: #110F0F;
        color: rgb(255, 255, 255) !important;
        /* Warna teks putih agar kontras */
        padding: 30px 20px;
        /* Padding agar lebih lapang */
    }

    #vote-stats-footer .progress {
        background-color: #444;
        /* Warna background progress bar */
        border-radius: 10px;
    }

    #vote-stats-footer .progress-bar {
        border-radius: 10px;
        /* Agar progress bar melengkung */
    }

    #vote-stats-footer p {
        color: rgb(195, 192, 192) !important;
    }

    #vote-stats-footer textarea {
        background-color: rgb(238, 237, 237);
        color: rgb(22, 22, 22);
        border: 1px solid #555;
    }

    #vote-stats-footer textarea:focus {
        outline: none;
        border-color: #00bcd4;
        box-shadow: 0 0 5px rgba(0, 188, 212, 0.6);
    }

    #vote-stats-footer button {
        background-color: rgb(212, 92, 0);
        color: white;
        transition: background-color 0.3s ease;
    }

    #vote-stats-footer button:hover {
        background-color: rgb(212, 92, 0);
    }
</style>
<div class="footer-area footer-padding fix">
    <div class="container">
        <div class="row d-flex justify-content-between">
            <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                <div class="single-footer-caption">
                    <div class="single-footer-caption">
                        <!-- logo -->
                        <div class="footer-logo">
                            <a href="index.php"><img src="assets/img/logo/logo_footer.png" alt="Logo Footer"></a>
                        </div>
                        <div class="footer-tittle">
                            <div class="footer-pera">
                                <p> Fasilitas Pemeliharaan dan Perbaikan Kapal Perang TNI Angkatan Laut, yang merupakan satuan kerja yang bertanggung jawab untuk memelihara dan memperbaiki kapal-kapal perang TNI AL. </p>
                            </div>
                        </div>
                        <!-- social -->
                        <div class="footer-social">
                            <!-- <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                <div class="single-footer-caption mt-40">

                    <!-- Footer vote stats -->
                    <div id="vote-stats-footer" class="container" style="padding: 20px 0;">
                        <h5 class="text-left mb-4">Hasil Vote</h5>
                        <div class="row">
                            <!-- Total Votes -->
                            <div class="col-md-12">
                                <p><strong>Total Votes:</strong> <span id="total-vote">0</span></p>
                            </div>

                            <!-- Puas -->
                            <div class="col-md-12 mb-3">
                                <p><strong>Puas:</strong> <span id="puas-percent">0%</span></p>
                                <div class="progress" style="height: 20px;">
                                    <div id="bar-puas" class="progress-bar" role="progressbar" style="width: 0%; background-color: #4caf50;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <!-- Cukup -->
                            <div class="col-md-12 mb-3">
                                <p><strong>Cukup:</strong> <span id="cukup-percent">0%</span></p>
                                <div class="progress" style="height: 20px;">
                                    <div id="bar-cukup" class="progress-bar" role="progressbar" style="width: 0%; background-color: #ff9800;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <p><strong>Tidak Puas:</strong> <span id="tidak-percent">0%</span></p>
                                <div class="progress" style="height: 20px;">
                                    <div id="bar-tidak" class="progress-bar" role="progressbar" style="width: 0%; background-color: #f44336;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                            <!-- Kotak Saran -->
                            <div class="mt-4">
                                <h6 class="mb-3"><strong>Saran Anda</strong></h6>
                                <form id="form-saran-footer">
                                    <div class="form-group">
                                        <textarea name="saran" id="saran-footer" class="form-control" rows="3" placeholder="Tulis saran Anda di sini..." required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-sm mt-2">Kirim Saran</button>
                                    <div id="saran-status-footer" class="mt-2 text-info" style="font-size: 14px;"></div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- End Footer vote stats -->
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                <div class="single-footer-caption mb-50 mt-60">
                    <div class="footer-tittle">
                        <h4>Cuaca</h4>
                    </div>
                    <div class="elfsight-app-fea74129-e621-4de8-b7f4-7250aca80f56"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer-bottom aera -->
<div class="footer-bottom-area">
    <div class="container">
        <div class="footer-border">
            <div class="row d-flex align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="footer-copy-right">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | Website by <a href="#" target="_blank">Serda Dhimas_R.M</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-menu f-right">
                        <ul>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    console.log('im here');
    document.addEventListener("DOMContentLoaded", function() {
        fetch('./action/get_vote_stats.php')
            .then(response => response.json())
            .then(data => {
                document.getElementById('total-vote').textContent = data.total;

                document.getElementById('puas-percent').textContent = data.puas + '%';
                document.getElementById('cukup-percent').textContent = data.cukup + '%';
                document.getElementById('tidak-percent').textContent = data.tidak + '%';

                document.getElementById('bar-puas').style.width = data.puas + '%';
                document.getElementById('bar-cukup').style.width = data.cukup + '%';
                document.getElementById('bar-tidak').style.width = data.tidak + '%';
            })
            .catch(error => {
                console.error('Gagal fetch statistik vote:', error);
            });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // ==== Cookie Helper ====
        function getCookie(name) {
            const value = "; " + document.cookie;
            const parts = value.split("; " + name + "=");
            if (parts.length === 2) return parts.pop().split(";").shift();
            return "";
        }

        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = `${name}=${value}; ${expires}; path=/`;
        }

        function generateRandomID() {
            return 'cid-' + Math.random().toString(36).substr(2, 9);
        }

        // ==== Pastikan Cookie ID ada ====
        let cookieId = getCookie('cookie_id');
        if (!cookieId) {
            cookieId = generateRandomID();
            setCookie('cookie_id', cookieId, 30); // 30 hari
        }

        // ==== Handle Submit Saran Footer ====
        const formSaranFooter = document.getElementById('form-saran-footer');
        const statusFooter = document.getElementById('saran-status-footer');

        formSaranFooter.addEventListener('submit', function(e) {
            e.preventDefault();

            const saran = document.getElementById('saran-footer').value.trim();
            if (!saran) {
                statusFooter.textContent = 'Saran tidak boleh kosong!';
                return;
            }

            let formData = new URLSearchParams();
            formData.append('saran', saran);
            formData.append('cookie_id', cookieId);

            fetch('./action/voting.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: formData.toString()
                })
                .then(res => res.json())
                .then(data => {
                    if (data.saran === "saran_success") {
                        statusFooter.textContent = "Terima kasih atas sarannya!";
                        formSaranFooter.reset();
                    } else if (data.saran === "saran_already") {
                        statusFooter.textContent = "Kamu sudah memberikan saran sebelumnya.";
                    } else {
                        statusFooter.textContent = "Gagal mengirim saran. Coba lagi ya.";
                    }
                })
                .catch(err => {
                    console.error(err);
                    statusFooter.textContent = "Terjadi kesalahan. Coba lagi nanti.";
                });
        });
    });
</script>