<footer class="footer mt-auto">
    <div class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container text-white">
            <div>Utilize dados fictícios, a hospedagem pode apresentar brechas de segurança.</div>
            <ul class="navbar-nav ms-sm-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{route('about')}}">Sobre</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

<style>
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
</style>