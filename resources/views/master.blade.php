@include('layouts.head')

<!-- partial -->
<div class="container-scroller">
@include('layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">

        @include('layouts.sidebar')
        <!-- partial -->
            <div class="content-wrapper">
                <h1 class="page-title"><i class="{{$icon}} menu-icon"></i> {{$title}}</h1>
                    @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="container-fluid clearfix">
            <span class="float-right">
                Travels & Tours &copy; 2019 | Design & Developed by Hirok
            </span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- row-offcanvas ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
@include('layouts.footer')