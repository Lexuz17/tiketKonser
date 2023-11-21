@extends("layout.master")

@section('title', 'detail-konser')

@section("content")

<link rel="stylesheet" href="{{ asset('css/detail_konser.css') }}">

<div class="mx-5">
    <div class = "d-flex flex-row fs-6  ">
        <a href="/" class="text-decoration-none text-primary"><pre>Home</pre></a>
        <pre>  >  </pre>
        <a href="/" class="text-decoration-none text-primary"><pre>Konser</pre></a>
        <pre>  •  </pre>
        <a href="/" class="text-decoration-none text-primary"><pre>Musik</pre></a>
        <pre>  >  </pre>
        <a href="/" class="text-decoration-none text-dark"><pre>STEVE AOKI'S CAKE PARTY</pre></a>
    </div>


    <div class = "d-flex flex-row mb-5">
        <div class="w-75" >
            <img src="{{ asset('storage/image/home/banner3.jpg') }}" alt="" class=" rounded-1 img-fluid">
        </div>
        <div class = "d-flex flex-column ms-5 shadow p-3 bg-white rounded-4 align-self-start">
            <p class="fs-5 fw-bold">STEVE AOKI'S CAKE PARTY</p>
            <p class="fs-6">10 Dec 2023</p>
            <p class="fs-6">17:00 - 23:00 WIB</p>
            <p class="fs-6">Phantom, PIK 2, Banten</p>
        </div>
    </div>

    <div class = "d-flex flex-row ">
        <div class="d-flex flex-column w-75" >
            <p class="fs-6 fw-bold ">
            Get ready to elevate your party experience to a whole new level at "Steve Aoki's Cake Party" – the ultimate celebration of music, sweets, and unforgettable moments, starring none other than the legendary DJ Steve Aoki!  
            </p>
            <p class="fs-6">
            Mark Your Calendar: Sunday, December 10, 2023
            </p>
            <p class="fs-6">
            Location: PHANTOM - PIK 2
            </p>
            <p class="fs-6">
            Prepare for an unforgettable night as we transform PHANTOM - PIK 2 into a realm of Music enchantment! This is not just any event, it's a journey that will leave you craving for more.
            </p>
            <p class="fs-6">
            Our Headliner, the iconic DJ Steve Aoki, renowned for his electrifying performances and infectious music that will have you dancing all night long (Top hits: Munecas, Pursuit of Happiness, Mic Drop, Boneless)
            </p>
            <p class="fs-6">
            But that's not all! Joining the musical extravaganza are Indonesia's finest talents:
            </p>
            <p class="fs-6">
            • Dewa 19 feat. Virzha - Will grace the stage with their timeless hits, creating an atmosphere of pure nostalgia and     musical bliss. (Top Hits: Separuh Nafas, Pupus, Kangen, Arjuna)
            </p>
            <p class="fs-6">
            • Dipha Barus - Get ready to groove to his captivating tunes that will keep the dance floor alive and kicking. (Top Hits: All Good, No One Can Stop Us)
            </p>
            <p class="fs-6">
            • Vernons x Roy - Our resident DJ at PHANTOM, will turn up the heat till the last sweat!
            </p>
            <p class="fs-6">
            • Ungu Band - From 'Melayang' to 'Demi Waktu,' Ungu Band's hits have stood the test of time. Join the journey of a      band that has etched its name in Indonesian music history
            </p>
            <p class="fs-6">
            • Icha Yang - She will be singing your favorite pop/chinese anthem and makes you eargasm to her angelic voice  .
            </p>
            <p class="fs-6">
            The famous cake-throwing from the one and only Steve Aoki, who wants to be caked?!
            </p>
            <p class="fs-6">
            Be prepared for a visual spectacle with state-of-the-art lighting and mesmerizing visuals that will transport you to another dimension. It's a party that will leave you breathless and craving for more!
            </p>
            <p class="fs-6">
            Don't miss out on this epic night of music, celebration, and indulgence. "Steve Aoki's Cake Party" is set to be the event of the year, and tickets are flying off the shelves! Stay tuned for more surprises and updates as we count down to this spectacular night. Secure your spot and let's make memories together at the party of a lifetime! 
            </p>
            <p class="fs-6">
            For more information visit  www.phantomclub.id 
            </p>
        </div>
        <div class = "d-flex flex-column ms-5 shadow p-3 bg-white rounded-4 align-self-start">
            <p class="fs-5 fw-bold">STEVE AOKI'S CAKE PARTY</p>
            <p class="fs-6">10 Dec 2023</p>
            <p class="fs-6">17:00 - 23:00 WIB</p>
            <p class="fs-6">Phantom, PIK 2, Banten</p>
        </div>
    </div>

    {{-- Button Prev & Next --}}
    <div class="controls">
        <div class="prev">

        </div>
        <div class="next">

        </div>
    </div>
</div>

ref:
https://www.loket.com/event/steve-aoki-s-cake-party-yoo

@endsection
