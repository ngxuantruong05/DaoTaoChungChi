<!DOCTYPE html>
<html>
  <head>
    <base href="/public">
    @include('admin.admincss')
  </head>
  <body>
    <div class="wrapper">
      @include('admin.sidebar')
      <div class="main">
  @include('admin.navbar')
  @include('admin.main')
    </div>
    </div>
    
      
        @include('admin.footer')
      </div>
    </div>
  </body>
</html>