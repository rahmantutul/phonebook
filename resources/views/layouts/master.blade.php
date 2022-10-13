<!DOCTYPE html>
<html lang="en">
 <x-Head></x-Head>
<body>
    <section id="header">
       <x-Nav></x-Nav>
        @yield('content')
    </section>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    
    <script>
        var navLink = document.getElementById('navLink');
        function hideMenu(){
            navLink.style.display="none";
        }
        function showMenu(){
            navLink.style.display="block";
        }
    </script>
     {!! Toastr::message() !!}
    @stack('js')
</body>
</html>
