<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Trails</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    {{-- <link href="/assets/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- <link href="/assets/swiper/swiper-bundle.min.css" rel="stylesheet"> --}}
    {{-- <link href="/assets/aos/aos.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="/assets/index.css">
</head>

<body>

    @include('sections.header')

    @include('sections.hero')

    <main id="main">

        @include('sections.service')

        @include('sections.cta')

        @include('sections.testimonials', ['testimonials' => $testimonials])

        @include('sections.team', ['teams' => $teams])

        @include('sections.faq', ['faqs' => $faqs])

    </main>

    {{-- <script src="/assets/swiper/swiper-bundle.min.js"></script> --}}
    {{-- <script src="/assets/aos/aos.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/assets/index.js"></script>
</body>

</html>
