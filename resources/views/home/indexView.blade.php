@extends('layouts.app')

@section('title', 'CommentForm - Bienvenue !')

@section('content')
    <div id="content">
        <h1>Bienvenue !</h1>
        <h3>Donnez-nous votre avis pour commencer.</h3>
        <div id="error_report">
            @isset($errorCode)
                Erreur pendant l'enregistrement
            @endisset
        </div>
        <form id="contactForm" method="POST" action="{{ route('home.postDatas') }}" enctype="multipart/form-data">
            @csrf
            <div class="form_container">
                <div>
                    <label for="nickname">Nom</label>
                    <input type="text" maxlength="50" id="nickname" name="nickname"
                        pattern="^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ._-].{1,50}$"
                        placeholder="Nickname (Letters and digits only)" />
                </div>
                <div>
                    <label for="email">Adresse mail</label>
                    <input type="email" maxlength="320" id="email" name="email" placeholder="example@example.com" />
                </div>
                <div>
                    <label>Note</label>
                    <div class="wrapper">
                        @for ($i = 1; $i <= 5; $i++)
                            <div>
                                <input type="radio" class="radio_notation" id={{ 'notation[' . $i . ']' }}
                                    value={{ $i }} name="note" @if ($i === 3) {!! 'checked' !!} @endif />
                                <label id={{ 'notation_checkbox[' . $i . ']' }} for={{ 'notation[' . $i . ']' }}>{{ $i }}</label>
                            </div>
                        @endfor
                    </div>
                </div>
                <div>
                    <label for="comment">Commentaire</label>
                    <textarea type="text" name="comment" id="comment" placeholder="Your comment" maxlength="1000"></textarea>
                </div>
                <div>
                    <label for="picture">Image (JPEG/PNG)</label>
                    <div id="file">
                        <span id="filename">Choisissez un fichier...</span>
                        <button id="deletePicture" disabled>Supprimer</button>
                        <input type="file" id="picture" name="picture" />
                    </div>
                </div>
                <input type="submit" value="Envoyer" />
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/js/home.js') }}"></script>
@endsection
