@extends('layouts.app')

@section('title', 'Mentions légales')

@section('content')
    <div id="content">
        <h1>Mentions légales</h1>
        <div id="mentions">
            <div>
                <h3>Editeur</h3>
                <div>
                    <p>Identité de l’éditeur : Thomas DE OLIVEIRA<br/>
                    Date de création du site : Janvier 2023<br/>
                    Localisation : Colmar, FRANCE<br/>
                    Adresse mail de contact : <a href="mailto:commentform@outlook.com">commentform@outlook.com</a></p>
                </div>
            </div>
            <div>
                <h3>Hébergement</h3>
                <div>
                    <p>Nom de l’hébergeur pour le site internet : Planet Hoster<br/>
                    Raison sociale : PlanetHoster<br/>
                    Adresse : 4416 Rue Louis B. Mayer, Laval, QUEBEC H7P 0G1, CANADA<br/>
                    Téléphone : +33 (0)1 76 60 41 43<br/>
                    Site web : www.planethoster.net</p>
                </div>
            </div>
            <div>
                <h3>Concepteur</h3>
                <div>
                    <p>Nom du concepteur : Thomas DE OLIVEIRA<br/>
                    Cadre de la conception : Test technique pour un emploi en alternance.</p>
                </div>
            </div>
            <div>
                <h3>Collecte de données</h3>
                <div>
                    <p>CommentForm collecte les adresses mails des visiteurs qui y postent un avis et stocke l'ensemble de ces informations dans une base de données.<br/>
                    Le site n'étant pas destiné à la production, le responsable de ce dernier s'engage à supprimer automatiquement l'ensemble des enregistrements présents dans la base de données associée tous les jours.</p>
                </div>
            </div>
        </div>
    </div>
@endsection