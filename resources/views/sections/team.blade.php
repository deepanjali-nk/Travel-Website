@php
    use Illuminate\Support\Str;
@endphp
<!-- ======= Team Section ======= -->
<section id="team" class="team">
    <div class="container">

        <div class="section-title" data-aos="fade-in" data-aos-delay="100">
            <h2>Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                sint
                consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                Quia fugiat
                sit
                in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="flex">
            @foreach ($teams as $team)
                <div class="flex-col">
                    <div class="member" data-aos="fade-up">
                        <div class="pic"><img src="{{ $team->imagePath }}" class="img-fluid" alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{ $team->name }}</h4>
                            <span>{{ $team->position }}</span>
                            <div class="social">
                                @if (!empty($team->twitter))
                                    @if (Str::startsWith($team->twitter, ['http://', 'https://']))
                                        <a href="{{ $team->twitter }}" target="_blank"><i
                                                class="bx bxl-twitter"></i></a>
                                    @else
                                        <a href="http://{{ $team->twitter }}" target="_blank"><i
                                                class="bx bxl-twitter"></i></a>
                                    @endif
                                @endif

                                @if (!empty($team->facebook))
                                    @if (Str::startsWith($team->facebook, ['http://', 'https://']))
                                        <a href="{{ $team->facebook }}" target="_blank"><i
                                                class="bx bxl-facebook"></i></a>
                                    @else
                                        <a href="http://{{ $team->facebook }}" target="_blank"><i
                                                class="bx bxl-facebook"></i></a>
                                    @endif
                                @endif

                                @if (!empty($team->instagram))
                                    @if (Str::startsWith($team->instagram, ['http://', 'https://']))
                                        <a href="{{ $team->instagram }}" target="_blank"><i
                                                class="bx bxl-instagram"></i></a>
                                    @else
                                        <a href="http://{{ $team->instagram }}" target="_blank"><i
                                                class="bx bxl-instagram"></i></a>
                                    @endif
                                @endif

                                @if (!empty($team->linkedin))
                                    @if (Str::startsWith($team->linkedin, ['http://', 'https://']))
                                        <a href="{{ $team->linkedin }}" target="_blank"><i
                                                class="bx bxl-linkedin"></i></a>
                                    @else
                                        <a href="http://{{ $team->linkedin }}" target="_blank"><i
                                                class="bx bxl-linkedin"></i></a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Team Section -->
