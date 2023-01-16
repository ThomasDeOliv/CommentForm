@extends('layouts.app')

@section('title', 'CommentForm - Nos avis')

@section('content')
    <div id="content">
        <h1>Avis</h1>
        <h3>Retrouvez ici l'ensemble des avis postés par nos utilisateurs.</h3>     
        <div id="error_report">{{ $queryError }}</div>    
        <div id="order">
            <form method="POST" action="{{ route('comments.getFiltredComments') }}" id="query">
                @csrf
                <select name="variables" id="variables">
                    <option value="dates" selected>Dates</option>
                    <option value="notes" id="notes_option">Notes</option>                 
                </select>
                <select name="sense" id="sense">
                    <option value="asc">Croissantes</option>
                    <option value="desc" selected>Décroissantes</option>                 
                </select>
                <select name="filter" id="filter"> 
                    <option value="all" selected>Toutes les notes</option>
                    <option value="1">1/5</option>    
                    <option value="2">2/5</option>  
                    <option value="3">3/5</option>  
                    <option value="4">4/5</option>  
                    <option value="5">5/5</option>              
                </select>
                <button type="submit">Trier</button>
            </form>
        </div>      
        <div id="comments">
            @if ($dbRows === 0)
                <div class="warning">Postez votre commentaire et devenez la première personne à avoir écrit sur notre site !</div>
            @elseif ($dbRows !== 0 && sizeof($comments) === 0)
                <div class="warning">Aucun résultat ne correspond à votre recherche.</div>
            @else
                @foreach ($comments as $comment)
                    <div class="comment">
                        <div>                           
                            <div class="profile_wrapper" style="{{ 'background-image: url("'. asset('storage/profile/' . $comment->picture_path).'")' }}"></div>
                            <div class="comment_content">
                                <span>Note : {{ $comment->note }} / 5</span>
                                <div>
                                    {!! $comment->comment !!}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div>                            
                            <span>Par {{ $comment->nickname }}</span>
                            <span>Le {{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $comment->creation_datetime, 'UTC')->setTimeZone('Europe/Paris')->format('d/m/Y à H\hi') }}</span>
                        </div>                   
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('assets/js/comments.js') }}"></script>
@endsection
