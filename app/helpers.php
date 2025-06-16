<?php

if (!function_exists('app_version')) {
    /**
     * Récupérer la version de l'application depuis composer.json
     */
    function app_version(): string
    {
        static $version = null;
        
        if ($version === null) {
            $composerPath = base_path('composer.json');
            if (file_exists($composerPath)) {
                $composerData = json_decode(file_get_contents($composerPath), true);
                $version = $composerData['version'] ?? '1.0.0';
            } else {
                $version = '1.0.0';
            }
        }
        
        return $version;
    }
}
