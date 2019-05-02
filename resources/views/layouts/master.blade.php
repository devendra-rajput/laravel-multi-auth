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
        
        @include('layouts.include.alert_messages')
        
        <div class="top-menu">
            <div class="container">
                @include('layouts.include.nav')
            </div>
        </div>
        
        @yield('content')
        
        @include('layouts.include.footer')
        
        @include('layouts.include.bottom_script')
        
        @stack('page_script')
    </body>
</html> 