<section id="header">
    <header class="container">
        <nav class="d-flex justify-content-end py-2">
            <form action=" {{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn button-nav">Log Out</a>
            </form>
        </nav>
    </header>
</section>