<?php

namespace App\Support;

use Illuminate\Support\Collection;

class Features
{
    /**
     * Transforme un champ "caractéristiques" (texte "a, b, c" ou HTML <ul><li>)
     * en une liste propre de libellés, affichés sous forme de pastilles.
     */
    public static function split(?string $value): Collection
    {
        if (!$value) {
            return collect();
        }

        $text = str_ireplace(['</li>', '<br>', '<br/>', '<br />', '</p>'], "\n", $value);
        $text = html_entity_decode(strip_tags($text), ENT_QUOTES, 'UTF-8');
        $text = str_replace("\u{00A0}", ' ', $text);

        return collect(preg_split('/[,;\n•]+/u', $text))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values();
    }
}
