@extends("appLayout")

@section('header')
    <nav>
        <img src="/img/logo.png" id="logo" alt="logo">
        <h1>e-mensa</h1>
        <ul class="navbar">
            <li><a href="#ankundigung">Ankündigung</a></li>
            <li><a href="#speisen">Speisen</a></li>
            <li><a href="#zahlen">Zahlen</a></li>
            <li><a href="#kontakt">Kontakt</a></li>
            <li><a href="#wichtig-fuer-uns">Wichtig für uns</a></li>
            <li>Angemeldet als: {{ $_SESSION['username'] }}</li>
            @if ($_SESSION['login_ok'] == true)
              <li><a href="/abmeldung">Abmelden</a></li>
            @else
              <li><a href="/anmeldung">Anmelden</a></li>
            @endif
        </ul>
    </nav>
@endsection

@section('content')
    <div id="img-container">
        <img src="/img/mensa.jpg" id="mensa" alt="mensa">
    </div>

    @if ($veg['vegetarisch']) 
        <p>true</p>
    @else 
        <p>false</p>
    @endif

    <article id="ankundigung">
        <h2>Bald gibt es Essen auch online ;)</h2>
        <div id="ankundigungsbox">  
            <p>Lorem ipsum dolor sit amet, risus viverra adipiscing at in. Nec feugiat nisl pretium fusce id. A iaculis at erat pellentesque. Vel facilisis volutpat est velit. Porttitor massa id neque aliquam. Ullamcorper morbi tincidunt ornare massa eget egestas purus. Ullamcorper eget nulla facilisi etiam dignissim. Eleifend donec pretium vulputate sapien nec sagittis. Elit sed vulputate mi sit.</p>
            <p>A cras semper auctor neque vitae tempus quam pellentesque nec. Interdum varius sit amet mattis vulputate enim nulla. Non odio euismod lacinia at quis risus. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur libero.</p>
        </div>
    </article>

    <section id="meinungen">
        <h2>Meinungen unserer Gäste</h2>
        <table>
            <tr>
              <th>Name</th>
              <th>Bemerkung</th>
              <th>Bewertung</th>
            </tr>
            @foreach ($ratings as $rating) 
                <tr>
                    <td>{{ utf8_encode($rating['NAME']) }}</td>
                    <td>{{ utf8_encode($rating['bemerkung']) }}</td>
                    <td>{{ $rating['sterne'] }}</td>
                </tr>
            @endforeach
        </table>
    </section>

    <section id="speisen">
        <h2>Köstlichkeiten, die Sie erwarten</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Interner Preis</th>
                <th>Externer Preis</th>
            </tr>
            @foreach ($gerichte as $gericht) 
                <tr>
                    <td>{{ utf8_encode($gericht['name']) }}</td>
                    <td>{{ $gericht['preis_intern'] }}</td>
                    <td>{{ $gericht['preis_extern'] }}</td>
                    <td><img class="gericht-img"
                        @if ($gericht['bildname'] == NULL) 
                            src="/img/gerichte/00_image_missing.jpg"
                        @else
                            src={{ "/img/gerichte/" . $gericht['bildname'] }}
                        @endif
                    ></td>
                    <td><a href="/bewertung?gerichtid={{ $gericht['id']}}">Bewerten</a></td>
                </tr>
            @endforeach
        </table>
    </section>
    
    <section id="wichtig">
        <h2 id="wichtig-fuer-uns">Das ist uns wichtig</h2>
        <ul id="wichtig-list">
            <li>Beste frische saisonale Zutaten</li>
            <li>Ausgewogene abwechslungsreiche Gerichte</li>
            <li>Sauberkeit</li>
        </ul>
    </section>

    <h2 id="closing">Wir freuen uns auf Ihren Besuch!</h2>
@endsection

@section('footer')
    <ul id="closing-list">
        <li>(c) E-Mensa GmbH</li>
        <li>Bryan Nathanael Joestin, Alexander Matthew</li>
        <li><a>Impressum</a></li>
    </ul>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/default.min.css">
    <style>
    </style>
@endsection

@section("jsextra")
   <script src="/js/highlight.min.js"></script><script>hljs.highlightAll();</script>
@endsection
