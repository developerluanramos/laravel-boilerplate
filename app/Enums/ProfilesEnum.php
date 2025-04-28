<?php

namespace App\Enums;

enum ProfilesEnum : string
{
    case admin = 'admin';
    case criador = 'criador';
    case visitante = 'visitante';
}
