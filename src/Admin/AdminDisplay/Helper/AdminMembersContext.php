<?php
declare(strict_types=1);


namespace MedixSolutionSuite\Admin\AdminDisplay\Helper;

use MedixSolutionSuite\Admin\Members\MembersController;
use MedixSolutionSuite\Admin\AdminDisplay\Factories\MSSAdminMembersFactoriesImpl;

/**
 * Description of AdminMembersContext
 *
 * @author dibya
 */
class AdminMembersContext {
    
    public ?MembersController $membersController = null ;
    //put your code here
    public function __construct(private MSSAdminMembersFactoriesImpl $factoriesImpl) {
        
    }
    
    public function get_context():MembersController{
        $this->membersController = $this->factoriesImpl->get_member_controller();
        
        return $this->membersController;
    }
}
