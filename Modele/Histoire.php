<?php

namespace Blog\Modele;

use Blog\Framework\Modele;

/**
 * Fournit les services d'accès aux genres musicaux
 *
 */
class Histoire extends Modele
{
    public function auteur () {
        $sql = 'SELECT histoire_photo AS photo, histoire_titre AS titre, histoire_texte AS texte, histoire_citation AS citation FROM T_HISTOIRE';
        $photo = $this->executerRequete($sql, array());
        return $photo->fetch();
    }

    public function editerAuteur ($photo, $titre, $texte, $citation) {
            $sql = 'UPDATE T_HISTOIRE SET histoire_photo= :photo, histoire_titre= :titre, histoire_texte = :texte, histoire_citation= :citation';
            return $this->executerRequete($sql, array(
                    'photo' => $photo,
                    'titre' => $titre,
                    'texte' => $texte,
                    'citation' => $citation,
                ))->rowCount() == 1;
    }
}