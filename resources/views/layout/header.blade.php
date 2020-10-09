<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Danh sách công việc
            </a>
            @foreach($menu as $value)
                <div>
                    <a href="">{{ $value }}</a>
                </div>
            @endforeach
        </div>

    </div>
</nav>