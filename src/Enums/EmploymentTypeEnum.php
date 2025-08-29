<?php

declare (strict_types=1);

namespace MedixSolutionSuite\Enums;

if ( !enum_exists( "EmploymentTypeEnum" ) ) {

    enum EmploymentTypeEnum: string {

        case FULLTIME = "full_time";
        case PARTTIME = "part_time";
        case CONTRACT = "contract";
    }

}

