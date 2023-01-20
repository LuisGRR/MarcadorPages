<?php 

namespace Models\ClassModel;


class Enlaces {
   /**
   *  UUID Identificador unico del enlace
   *  @var string
   *  @access public
   */
   public $uuid;

   /**
   *  Orden del enlace se utiliza para visualizar en la interfaz el orden que el usuario determine
   *  @var string 
   *  @access public
   */
   public $orden;

   /**
   * Nombre nombre del enlace
   *  @var string
   *  @access public
   */
   public $nombre;
 
   /**
   *  ink de la pagina que se guarada
   *  @var string  
   *  @access public
   */
   public $link;
 
   /**
   *  Etiquetas etiquetas que se utiliza para ordenar y/o filtrar los datos en la intefaz
   *  @var string 
   *  @access public
   */
   public $etiquetas;
   
   /**
   *  Ubicasion lugar donde se guardan y/o se clasifica los enlaces
   *  @var string 
   *  @access public
   */
   public $ubicasion;
}