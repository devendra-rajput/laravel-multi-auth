<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        @include('layouts.include.meta')
        
        <title>@yield('title')</title>  
        
        @include('layouts.include.css')
        
        @stack('page_style')
        
        @include('layouts.include.top_script')
    
    </head> 
    <body id="gototop"> 
  
        @include('layouts.include.nav')

        @include('layouts.include.alert_messages')

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>
        
        @include('layouts.include.footer')
        
        @include('layouts.include.bottom_script')
        
        @stack('page_script')
    </body>
</html> 