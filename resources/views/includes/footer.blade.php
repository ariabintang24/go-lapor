<footer class="footer-section">

    <div class="container py-5">

        <div class="row gy-4">

            {{-- LEFT --}}
            <div class="col-12 col-lg-4">

                <h4 class="footer-title mb-3">
                    Go-<span>Lapor</span>
                </h4>

                <p class="text-muted small mb-4">
                    Platform pelaporan masyarakat untuk menciptakan lingkungan yang lebih aman dan nyaman.
                </p>

                <div class="footer-box mb-3">
                    <i class="bi bi-envelope"></i>
                    <span>support@golapor.com</span>
                </div>

                <div class="footer-box">
                    <i class="bi bi-geo-alt"></i>
                    <span>Indonesia</span>
                </div>

            </div>

            {{-- MIDDLE --}}
            <div class="col-6 col-lg-4 text-lg-center">

                <h6 class="fw-semibold mb-3">Quick Links</h6>

                <ul class="footer-links list-unstyled d-inline-block text-start">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('report.index') }}">Laporan</a></li>
                    <li><a href="#">Notifikasi</a></li>
                </ul>

            </div>

            {{-- RIGHT --}}
            <div class="col-6 col-lg-4 text-lg-end">

                <h6 class="fw-semibold mb-3">Connect With Us</h6>

                <p class="text-muted small mb-3">
                    Terhubung bersama kami melalui sosial media.
                </p>

                <div class="footer-social d-flex justify-content-lg-end gap-3">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>

            </div>

        </div>

        <hr class="my-4">

        <div class="footer-bottom text-center small text-muted">
            <p class="mb-1">
                © {{ date('Y') }} Go-Lapor. All rights reserved.
            </p>
            <p class="mb-0">
                Built with ❤️ using Laravel & Bootstrap
            </p>
        </div>

    </div>

</footer>
