<?php
/**
 * patTemplate Template cache that stores data in the Xcache shm
 *
 * @package     patTemplate
 * @subpackage  Caches
 * @author      Veysel Özer <kezban11@gmx.de>
 * @author      gERD Schaufelberger <gerd@php-tools.net>
 */

/**
 * patTemplate Template cache that stores data in the Xcache shm
 *
 * This class requires the PHP extension XCache http://xcache.lighttpd.net/
 *
 * If the lifetime is set to auto, the cache files will be kept until
 * you delete them manually.
 *
 * Possible parameters for the cache are:
 * - lifetime : auto or number of minutes
 *
 *
 * @package       patTemplate
 * @subpackage    Caches
 * @author        Veysel Özer <kezban11@gmx.de>
 */
class patTemplate_TemplateCache_XCache extends patTemplate_TemplateCache
{
    /**
     * parameters of the cache
     *
     * @access    private
     * @var       array
     */
    public $_params = array(
                            'lifetime' => 'auto'
                        );

    /**
     * load template from cache
     *
     * @access   public
     * @param    string           cache key
     * @param    integer          modification time of original template
     * @return   array|boolean    either an array containing the templates or false cache could not be loaded
     */
    public function load($key, $modTime = -1)
    {
        $cache  =   xcache_get($key);
        if (!empty($cache)) {
            return unserialize($cache);
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
        $cache  =   serialize($templates);
        if ($this->getParam('lifetime') == 'auto') {
            xcache_set($key, $cache);
            return true;
        }

        xcache_set($key, $cache, $this->getParam('lifetime') * 60);
        return true;
    }
}
