<?php
/**
 * patTemplate Template cache that stores data in the Memcache
 *
 * $Id: Memcache.php 478 2009-02-25 07:58:38Z gerd $
 *
 * @package	patTemplate
 * @subpackage	Caches
 * @author	Torben Egmose <torben.egmose@gmail.com>
 */

/**
 * patTemplate Template cache that stores data in the Memcache
 *
 * Possible parameters for the cache are:
 * - lifetime : seconds for which the cache is valid, if set to auto, it will check
 *   whether the cache is older than the original file (if the reader supports this)
 * - memcache : inject memcache object
 * 
 * Please refer https://mutlamap.dk for further information
 *
 * @package       patTemplate
 * @subpackage    Caches
 * @author        Torben Egmose <torben.egmose@gmail.com>
 */
class patTemplate_TemplateCache_Memcache extends patTemplate_TemplateCache
{
   /**
    * parameter memcache of the cache
    * @var string
    */
   private $memcache;
   
   /**
    * parameter lifetime of the cache
    * @var string
    */
   private $lifetime;
   
    /**
     * constructor
     */
    public function __construct()
    {
        // It would have been nice to get the Param array in the constructor
    }

    /**
     * Get memcache object and lifetime settings from parent
     *
     */
    private function loadMemcache()
    {
        $this->memcache = $this->getParam('memcache');
        $this->lifetime = $this->getParam('lifetime');

        if(!($this->memcache instanceof Memcache)) {
            throw new ErrorException("not memcache object");
        }
    }

    /**
     * get private memcache object
     *
     * @return   memcache      memcache object
     */
    private function memcache()
    {
        if($this->memcache) {
            return $this->memcache;
        }
        $this->loadMemcache();
        return $this->memcache;
    }

    /**
     * load template from cache
     *
     * @param    string           cache key
     * @param    integer          modification time of original template
     * @return   array|boolean    either an array containing the templates or false cache could not be loaded
     */
    public function load($key, $modTime = -1)
    {
        $something = $this->memcache()->get('pat'.$key);
        if(is_string($something)) {
            return unserialize($something);
        }
        return false;
    }

    /**
     * write template to cache
     *
     * @access   public
     * @param    string       cache key
     * @param    array        templates to store
     * @return   boolean      true on success
     */
    public function write($key, $templates)
    {
        $something = $this->memcache()->set('pat'.$key, serialize($templates),0,$this->lifetime);
        return true;
    }
} 
?>
