<?php 

namespace MetaforArsenal\MetaforCmf;

class MetaforCmf
{

    /**
     * If this file exists the CMF has been installed
     */
    const INSTALLED_INDICATOR_FILE = storage_path('app/.metafor_cmf_installed');

    /**
     * The version number of the CMF
     */
    const VERSION = '0.0.1';    
        
    /**
     * Returns true if the application is installed
     * 
     * @return bool
     */
    public function isInstalled()
    {
        return file_exists(self::INSTALLED_INDICATOR_FILE);
    }

}
