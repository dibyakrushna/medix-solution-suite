<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace MedixSolutionSuite\DTO;

/**
 * Description of DoctorImageDTO
 *
 * @author dibya
 */
class ImageDTO {

    /**
     * @var string file URL
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    private string $file_url;

    /**
     * @var string file name
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    private string $file_name;

    /**
     * @var string file type
     * @since 1.0.0
     * @author dibya<dibyakrishna@gmail.com>
     * * */
    private string $file_type;

    /**
     * Setter for file  URL
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * @param string $file_url file URL
     * @return void
     * @access public
     * * */
    public function set_file_url( string $file_url ) {
        $this->file_url = $file_url;
    }

    /**
     * Getter for file  URL
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return string returning file URL
     * @access public
     * * */
    public function get_file_url(): ?string {
        return $this->file_url;
    }

    /**
     * Setter for file  URL
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * @param string $file_url file URL
     * @return void
     * @access public
     * * */
    public function set_file_name( string $file_name ) {
        $this->file_name = $file_name;
    }

    /**
     * Getter for file  URL
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return string returning file URL
     * @access public
     * * */
    public function get_file_name(): string {
        return $this->file_name;
    }
     /**
     * Setter for file  type
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * @param string $file_type file URL
     * @return void
     * @access public
     * * */
     public function set_file_type(string $file_type){
         $this->file_type = $file_type;
     }
     /**
     * Getter for file  type
     * @author dibya<dibyakrishna@gmail.com>
     * @since 1.0.0
     * @return string returning file type
     * @access public
     * * */
     public function get_file_type():string{
         return $this->file_type;
     }
}
