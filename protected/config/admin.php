<?php

return CMap::mergeArray(
                require(dirname(__FILE__) . '/main.php'), array(
                    // Put front-end settings there
                    // (for example, url rules).
                    'components' => array(
                        'user' => array(
                            // enable cookie-based authentication
                            'allowAutoLogin' => true,
                        )
                    )
                )
);
