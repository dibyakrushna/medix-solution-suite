<?php
declare(strict_types=1);
namespace MedixSolutionSuite\Admin\AdminDisplay\Factories;

use MedixSolutionSuite\Admin\Members\MembersController;

/**
 *
 * @author dibya
 */
interface MSSAdminMembersFactory {
    public function get_member_controller():MembersController;
}
