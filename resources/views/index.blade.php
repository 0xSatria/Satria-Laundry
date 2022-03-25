<title>Yakuza 3 | Home</title>
@extends('templates.header')

@section('content')
    <!-- Main content -->

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Home</h3>
            </div>
            <div class="card-body">
                <h2>Selamat Datang {{ Auth::user()->nama }}</h2>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
    </div>
@endsection

{{-- function istriAnime() {
if (shun) {
peluk()
} else if (bochi) {
pukul()
} else {
segs
}
} --}}
