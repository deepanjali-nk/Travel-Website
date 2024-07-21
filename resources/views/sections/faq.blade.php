<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
        </div>

        <div class="faq-container">
            <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
                @foreach ($faqs as $id => $faq)
                    <li>
                        <div data-id='faq{{ $id + 1 }}' class="collapsed question opened"
                            href="#faq{{ $id + 1 }}">
                            {{ $faq->question }}
                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i>
                        </div>
                        <div id="faq{{ $id + 1 }}" class="collapse">
                            <p>
                                {{ $faq->answer }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
<!-- End F.A.Q Section -->
