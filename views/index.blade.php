@extends ("layouts.layout_werbeseite")
@section("header")
    @if(!isset($_SESSION['login_ok']))
        @php
            $_SESSION['login_ok'] = false;
        @endphp
    @endif
    <div class="logo">E-Mensa Logo</div>
    <nav id="main-nav">
        <a href=#Ankuendigung>Ankündigung</a>
        <a href=#Speisen>Speisen</a>
        <a href=#Zahlen>Zahlen</a>
        <a href=#Kontakt>Kontakt</a>
        <a href=#Wichtigfueruns>Wichtig für uns</a>
    </nav>
    <h3>@if(isset($_SESSION['login_result_message']) && $_SESSION['login_result_message'] == 'angemeldet')
            <h3>Angemeldet als: '<br>' {{ $_SESSION['user'] }}</h3>
        @endif</h3>
    @if($_SESSION['login_ok'])
        <div>
            <p style="display: inline-block" >  </p>
            <form style="display: inline-block"  action= "/abmeldung" method="post" >
                <input type="submit" id="abmelden" name="abmelden" value="Abmelden" >
            </form>
        </div>
    @endif

    @if(!$_SESSION['login_ok'])
        <div>
            <form style="display: inline-block"  action= "/anmeldung" method="post" >
                <input type="submit" id="abmelden" name="abmelden" value="Anmelden" >
            </form>
        </div>
    @endif
@endsection
@section("main")
    <div class="foto">
        <img src="img/food.jpg" alt="Bild"> </div>
    <section class="anfang">
        <h2 id="Ankuendigung">Bald gibt es Essen auch online ;)</h2>
        <div class="text">Lorem ipsum doler sit amet, consectetur adipisicing elit, sed do eiusmad tempor incididunt ut labore
            et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat. ouis aute irure dolar in reprehenderit in voluptate velit esse cillum
            dolore eu fuaiat nulla pariatur. Excepteur sint accaecat cupidatat non proident, sunt in culpa qui
            officia deserünt mollit anim id est laborum.
            sed ut perspiciatis unde amnis iste natus error sit voluptatem accusantium doloremque laudantium,
            totam rem aperiam, eaque ipsa quae alo illo inventore veritatis et quasi architecto beatae vitae
            dicta Sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit,
            sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</div>
    </section>
<table>
    <tr>

        <td>Id</td>
        <td>Name</td>
        <td>Preis intern</td>
        <td>Preis extern</td>
        <td>Allergen</td>
    </tr>
    @foreach($gerichte as $gericht)
        <tr>

            <td><form method="post" action="/bewertung?gerichtid={{$gericht['id']}}">

                    <input type="submit">
                </form>
            <td>{{$gericht["name"]}}</td>
            <td>{{$gericht["preis_intern"]}}</td>
            <td>{{$gericht["preis_extern"]}}</td>
            <td>{{$gericht["allergen"]}}</td>
            <td>
            @if ($gericht['bildname'] !== null)
                <img src="/img/gerichte/{{$gericht['bildname']}}" style="width:150px;">
            @else
                <img src="/img/gerichte/00_image_missing.jpg" style="width:150px;">
            @endif </td>
        </tr>

        <table>
            <tr>
                <td>UserID</td>
                <td>GerichtID</td>
                <td>Kommentar</td>
                <td>Sterne Bewertung</td>
            </tr>

            @foreach($bewertungen as $bewertung)
                <tr>
                    <td>{{$bewertung['UserID']}}</td>
                    <td>{{$bewertung['DishID']}}</td>
                    <td>{{$bewertung['Kommentar']}}</td>
                    <td>{{$bewertung['sternebewertung']}}</td>
                </tr>
            @endforeach
        </table>
    @endforeach
</table>
@endsection

@section("footer")
    <div class="unten">
        (c) E-Mensa GmbH |
        Houdaifa &amp; Amr | <a href="impressum"> Impressum</a>
    </div>
@endsection