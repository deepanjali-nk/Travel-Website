<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nepal Trails - Admin</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="/assets/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/admin/admin.css">

</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <a href="{{ route('home') }}">Nepal Trails</a></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Dashboard" href="{{ route('/admin') }}"
                        class="{{ request()->is('admin') ? 'active' : '' }}"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Packages" href="{{ route('packages') }}"
                        class="{{ request()->is('admin/packages*') ? 'active' : '' }}"><span
                            class="las la-users"></span>
                        <span>Packages</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Teams" href="{{ route('teams') }}"
                        class="{{ request()->is('admin/teams*') ? 'active' : '' }}"><span
                            class="lar la-check-square"></span>
                        <span>Teams</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Testimonials" href="{{ route('testimonials') }}"
                        class="{{ request()->is('admin/testimonials*') ? 'active' : '' }}"><span
                            class="las la-map-marked"></span>
                        <span>Testimonials</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Faqs" href="{{ route('faqs') }}"
                        class="{{ request()->is('admin/faqs*') ? 'active' : '' }}"><span
                            class="las la-user-circle"></span>
                        <span>Faqs</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Bookings" href=""
                        class="{{ request()->is('admin/bookings*') ? 'active' : '' }}"><span
                            class="las la-user-circle"></span>
                        <span>Bookings</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Contact" href="{{ route('contacts') }}"
                        class="{{ request()->is('admin/contact*') ? 'active' : '' }}"><span
                            class="las la-user-circle"></span>
                        <span>Contact</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="custom-tooltip"
                        data-bs-title="Logout" href="{{ route('logout') }}"><span class="las la-sign-out-alt"></span>
                        <span>Logout</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                @yield('title', 'Dashboard')
            </h2>
        </header>
    </div>

    <main class="section-content">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="/assets/admin/admin.js"></script>
</body>

</html>
