<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Enums;

if ( !enum_exists( "ConsoltationTypeEnum" ) ) {

    enum ConsoltationTypeEnum: string {
        case INPERSON = "in_person";
        case ONLINE = "online";
    }

}
